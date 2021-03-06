<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Order;
use App\Distribution;
use App\Distributionrecord;
use App\Cashierorder;
use App\Branch;
use App\Branchuser;
use App\Packagebranch;
use App\Supplier;
use App\Purchase;
use App\User;
use App\Reqorder;
use App\Reservation;
use App\Purchaserecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;
use Response;
Use DB;

class CashierController extends Controller
{
    //
    public function index(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProduct = Productquantity::where('branch_id','=',$dataBranch->branch_id)->with('product')->take(10)->get();
        //dd($dataProduct);
        $dataPackage = Packagebranch::where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        $dataReqorder = DB::table('cashierorders')
        ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('cashier_id', '=', $userId)
        ->where('status', '=', 0)
        ->get();
        return view('cashier.dashboard', compact('dataPackage','dataProduct', 'dataReqorder'));
    }
    public function items(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProduct = Productquantity::where('branch_id','=',$dataBranch->branch_id)->with('product')->get();
        //dd($dataProduct);
        $dataReqorder = DB::table('cashierorders')
        ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('cashier_id', '=', $userId)
        ->where('status', '=', 0)
        ->get();
        return view('cashier.items', compact('dataProduct', 'dataReqorder'));
    }
    public function orders(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
       
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        
        $dataReservation = Reservation::where('branchId', '=', $dataBranch->id)
        ->where('reservestatus', '=', 0)
        ->with('customer')->get();
        //dd($dataReservation);
        return view('cashier.orders', compact('dataReservation'));
    }

    public function addProducts(Request $request)
    {
        $rules = array(
                'item_id' => 'required',
                'quantity' => 'required',
                'amount' => 'required'
                
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            
            $data = new Cashierorder();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $totalamount = $request->quantity * $request->amount;
            $data->ramount = $totalamount;
            $data->cashier_id = Auth::user()->id;
            $data->status = 0;
            $data->save();
            return response()->json($data);
        }
    }
    public function viewOrders($requestId){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataReqorder = DB::table('reqorders')
        ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('req_id', '=', $requestId)
        ->where('status', '=', 1)
        ->get();

        //$dataReqorder = Reqorder::where('req_id', '=', $requestId)->with('product')->get();
        return view('cashier.vieworder',compact('dataReqorder', 'dataBranch'));
    }
    public function processOrder(Request $request)
    {

        if($request->amount > $request->money){
            Session::flash('message', "Your money is not enough");
            return Redirect::back();
            //return Redirect::back()->withErrors('money', 'Your money is not enoug');
        }
        else {
            if (Auth::check())
            {
                $userId = Auth::user()->id;
            }
            $dataBranch = Branchuser::where('userid', '=', $userId)->first();
            $dataProduct = Productquantity::where('branch_id','=',$dataBranch->branch_idd)->take(20)->get();
            //dd($dataProduct);
            $dataReqorder = DB::table('cashierorders')
            ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
            ->join('products', 'productquantities.prod_id', '=', 'products.id')
            ->where('cashier_id', '=', $userId)
            ->where('status', '=', 0)
            ->get();
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $orderNumber = '';
            for ($i = 0; $i < 10; $i++) {
                $orderNumber .= ucwords($characters[rand(0, $charactersLength - 1)]);
            }

            $id = Auth::user()->id;
            $data = new Purchase();
            $data->amount = $request->amounttopay;
            $data->amountpaid = $request->money;
            $change = $request->money - $request->amounttopay;
            $data->change = $change;
            $data->cashier_id = $id;
            $data->orderNumber = $orderNumber;
            $data->date = date('Y-m-d');
            $data->save();

            $updateCashierOrder = Cashierorder::where('cashier_id', '=', $id)
            ->get();

            foreach($updateCashierOrder as $Order){
                $dataOrder = new Order();
                $dataOrder->cashier_id = $id;
                $dataOrder->orderId =  $orderNumber;
                $dataOrder->itemId = $Order->item_id;
                $dataOrder->ramount = $Order->ramount;
                $dataOrder->rquantity = $Order->rquantity;
                $dataOrder->save();
                //dd($Order);
                $Productquantity = Productquantity::where('id', '=', $Order->item_id)
            ->first();
                if($Productquantity->quantity >= $Order->rquantity ){
                    $productquantity = $Productquantity->quantity - $Order->rquantity;
            
                    $updateRecOrder = Productquantity::where('id', '=', $Productquantity->id)
                    ->update(['quantity' => $productquantity]);
                    
                    Cashierorder::find($Order->id)->delete();
                }
                else {
                    echo "Quantity sold is Lesser than your Quantity on Stock";
                }       
            }
            return view('cashier.reciept', compact('data','dataReqorder','dataProduct', 'updateCashierOrder', 'request'));
        }
   
    }
    public function updateQuantity(Request $request)
    {
        $productReq = Cashierorder::where('cashier_id','=', $request->cashierid)->where('item_id','=', $request->id)->first();
        $data = Cashierorder::find($productReq->id);
        $data->rquantity = $request->quantity;
        $totalamount = $request->quantity * $request->amount;
        $data->ramount = $totalamount;
        $data->save();
        //dd($productReq);
        return response()->json($data);
    }
    public function updateprice(Request $request)
    {
        $data = Productquantity::find($request->item_id);
        $data->price = $request->amount; 
        $data->save();
        return response()->json($data);
    }
    public function orderupdatequantity(Request $request)
    {
        $rules = array(
            'item_id' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
            
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            
            $data = new Cashierorder();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $totalamount = $request->quantity * $request->amount;
            $data->ramount = $totalamount;
            $data->cashier_id = Auth::user()->id;;
            $data->status = 0;
            $data->save();

            $updateReservation = Reservation::where('requestId', '=', $request->reqid)
            ->update(['reservestatus' => 1]);
            $dataReqorder = Reqorder::where('req_id', '=', $request->reqid)
            ->where('item_id', '=', $request->item_id)
            ->update(['status' => 2]);
            
            //dd([$dataReqorder, $updateReservation]);
            return response()->json($data);
        }
    }
    public function deleteOrder($itemid, $requestId)
    {
        $userId = Auth::user()->id;
       
        $productReq = Cashierorder::where('cashier_id','=', $userId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        Cashierorder::find($productReq->id)->delete();
        return redirect()->to('/cashier/dashboard'); 
    }
    public function deleteproduct($itemid)
    {
        $userId = Auth::user()->id;
        $productReq = Cashierorder::where('cashier_id','=', $userId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        Cashierorder::find($productReq->id)->delete();
        return redirect()->to('/cashier/dashboard'); 
    }
    public function productSearch(Request $request){
            $q = $request->input('q');
            $userId = Auth::user()->id;
            $dataBranch = Branchuser::where('userid', '=', $userId)->first();
           
                //dd($branchId = $dataBranch->id);
          
            $dataProductquantity = Product::where('product_name', 'LIKE', '%' . $q . '%')
            ->with(['quantity' => function($query){
                $userId = Auth::user()->id;
                $dataBranch = Branchuser::where('userid', '=', $userId)->first();
                $query->where('branch_id', '=', $dataBranch->branch_id); 
            
            }])
            ->get();

            $data = Branch::with('cashier')->get();
            $dataUser = User::where('usertype', '=', 'cashier')->get();
            return view('cashier.productsearch',compact('data','dataUser','dataProductquantity'));
    }
    public function report()
    {
        $userId = Auth::user()->id;
        $reportPurchase = Purchase::where('cashier_id','=', $userId)->get();
        //dd($reportPurchase);
        $TotalSales = Purchase::where('cashier_id', '=', $userId)->sum('amount');
        $DailySales = Purchase::where('cashier_id', '=', $userId)
        ->where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('cashier.report',compact('reportPurchase', 'TotalSales', 'DailySales'));
    }
    public function reportrange(Request $request){
        $userId = Auth::user()->id;
        $reportPurchase = Purchase::where('cashier_id','=', $userId)
        ->where('date', '>=', $request->from)
        ->where('date', '<=', $request->to)
        ->get();
        $TotalSales = Purchase::where('cashier_id', '=', $userId)->sum('amount');
        $DailySales = Purchase::where('cashier_id', '=', $userId)
        ->where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('cashier.report',compact('reportPurchase', 'TotalSales', 'DailySales'));
    }
    public function declineOrder($itemid, $requestId)
    {
        $shoppingId = session()->get('shoppingId');
        //$productReq = Reqorder::where('req_id','=', $requestId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        $dataReqorder = Reqorder::where('req_id', '=', $requestId)
            ->where('item_id', '=', $itemid)
            ->update(['status' => 3]);
        //Reqorder::find($productReq->id)->delete();
        return redirect()->to('/cashier/orders/'.$requestId); 
    }
    public function declineReservation($requestId)
    {
        $shoppingId = session()->get('shoppingId');

        $updateReservation = Reservation::where('requestId', '=', $requestId)
        ->update(['reservestatus' => 3]);
        $dataReqorder = Reqorder::where('req_id', '=', $requestId)
            ->update(['status' => 3]);

        return redirect()->to('/cashier/orders'); 
    }
    public function receiving()
    {
        $userId = Auth::user()->id;
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataDistributionList = Distribution::where('branchid','=',$dataBranch->branch_id)->latest()->with('branch')->take(5)->get();
        $dataDistributionrecord = Distributionrecord::where('branchid','=',$dataBranch->branch_id)->with('product')->get();
        
        return view('cashier.receiving',compact('data','dataDistributionrecord', 'dataDistributionList','distributionnumber'));
      
    }
    public function receivingdetails($drnumber)
    {
        $userId = Auth::user()->id;
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataDistributionList = Distribution::where('branchid','=',$dataBranch->branch_id)->latest()->with('branch')->take(5)->get();
        $dataDistributionrecord = Distributionrecord::where('branchid','=',$dataBranch->branch_id)->where('distributionnumber','=',$drnumber)->with('product')->get();
        
        return view('cashier.receivingdetails',compact('data','dataDistributionrecord', 'dataDistributionList','drnumber'));
      
    }
    public function receivingstocks(Request $request)
    {
        // Distributionrecord::where('id', '=', $request->distributionrecordid)
        //     ->update(['status' => 2, 'recievedate' => $request->recievedate, 'recievequantity' => $request->recievequantity]);

        Distributionrecord::where('id', '=', $request->distributionrecordid)
            ->update(['status' => 2, 'recievequantity' => $request->recievequantity]);
        $dataDistribution = Distributionrecord::where('id', '=', $request->distributionrecordid)
                            ->first();
        
        $dataProduct = Productquantity::where('branch_id', '=', $dataDistribution->branchid)
            ->where('prod_id', '=', $dataDistribution->productid)
            ->first();
        $updateQuantity = $dataProduct->quantity + $request->recievequantity;
        $dataProductUpdate = Productquantity::where('id', '=', $dataProduct->id)
            ->update(['quantity' => $updateQuantity]);
        // dd($dataDistribution);
        //     $dataPurchaserecord = Purchaserecord::where('id', '=', $request->requestid)->take(1)->get();
        //     //dd($dataPurchaserecord);
        //     foreach($dataPurchaserecord as $PurchaseRecord){
        //         $dataProductQuantity = Product::where('id', '=', $PurchaseRecord->prodquantityid)->take(1)->get();
        //         foreach($dataProductQuantity as $ProductQuantity) {
        //             $Quantity = $ProductQuantity->warehousequantity + $request->recievequantity;
        //             $updateProductQuantity = Product::where('id', '=', $PurchaseRecord->prodquantityid)
        //             ->update(['warehousequantity' => $Quantity]);
        //         }   
        //     }
            return response()->json();
    }
    public function deliveryRecieved($drnumber){
        Distribution::where('distributionnumber', '=', $drnumber)
        ->update(['status' => 2]);
        return redirect('cashier/receiving');
        //return response()->json();
    }
}