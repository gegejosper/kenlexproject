<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Branch;
use App\Supplier;
use App\Purchase;
use App\Purchaserecord;
use App\Purchaserequest;
use App\Distribution;
use App\Distributionrecord;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class DistributionController extends Controller
{
    //
    public function distributebranchproduct($distributionnumber)
    {
            $dataDistribution = Distribution::where('distributionnumber','=',$distributionnumber)
                                    ->with('branch')
                                    ->get();
            $dataDistributionRecord = Distributionrecord::where('distributionnumber','=',$distributionnumber)
                                    ->with(['branch', 'product'])
                                    ->get();
            $dataProduct = Product::all();
            $dataProductofStock = Product::where('warehousequantity','<', 10)->get();
            return view('accounting.distributionbranch',compact('distributionnumber', 'dataProduct', 'dataDistribution', 'dataProductofStock', 'dataDistributionRecord')); 
    }
    public function readDistribution()
    {
        $dataProductquantity = Product::with('quantity')
            ->get();
        $dataBranch = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
        $dataDistribution = Distribution::latest()->take(1)->get();
        $dataDistributionList = Distribution::latest()->with('branch')->take(5)->get();
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->take(10)->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('accounting.distribution',compact('dataBranch','dataUser','dataProductquantity', 'dataPurchase', 'dataProduct', 'dataDistribution', 'dataDistributionList'));    
    }

    public function createdistribution(Request $request)
    {
       
            $data = new Distribution();
            $data->distributionnumber = $request->distributionnumber;
            $data->branchid = $request->branch;
            $data->date = $request->distributiondate;
            $data->status = 0;
            $data->save();
            return redirect('accounting/distribution/'.$request->distributionnumber);
            //return response()->json($data);
    }
    public function adddistributionrecord(Request $request)
    {
            $data = new Distributionrecord();
            $data->distributionnumber = $request->distributionnumber;
            $data->branchid = $request->branchid;
            $data->date = $request->date;
            $data->quantity = $request->quantity;
            $data->productid = $request->prodquantityid;
            $data->status = 0;
            $data->save();
            $dataProduct = Product::where('id', '=', $request->prodquantityid)->take(1)->get();

            foreach ($dataProduct as $Product){
                $dataProductQuantity = $Product->warehousequantity;
            }
            $decuctProductQuantity = $dataProductQuantity - $request->quantity;
            Product::where('id', '=', $request->prodquantityid)
            ->update(['warehousequantity' => $decuctProductQuantity]);
            return response()->json();
    }
    public function deletedistributionrecord(Request $req){
        Distributionrecord::find($req->id)->delete();
        return response()->json();
    }
    public function generatedistribution(Request $req){
        Distribution::where('distributionnumber', '=', $req->distributionnumber)
        ->update(['status' => 1]);
        return response()->json();
    }
    public function distributionHistoryAcc($distributionnumber)
    {
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataDistributionList = Distribution::latest()->with('branch')->take(5)->get();
        $dataDistributionrecord = Distributionrecord::where('distributionnumber','=',$distributionnumber)->with('product')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('accounting.distributionhistory',compact('data','dataUser','dataDistributionrecord', 'dataDistributionList','distributionnumber'));
      
    }
}
