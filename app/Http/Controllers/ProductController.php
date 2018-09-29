<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Branch;
use App\Branchuser;
use App\Supplier;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $rules = array(
                'product_name' => 'required',
                'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataProduct = Product::all();
            $dataBrand = Brand::all();
            $dataProductquantity = Productquantity::with(['tagged','product'])->get();
            //dd($dataProductquantity);
            $dataCategory = Category::all();
            $dataBranch = Branch::all();
            $dataSupplier = Supplier::all();
            $data = new Product();
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/productimg');
            $image->move($destinationPath, $name);
            $data->pic =  $name;
            $data->product_name = $request->product_name;
            $data->description = $request->description;
            $data->brand_id = $request->brand_id;
            $data->category_id = $request->category_id;
            $data->warehousequantity = $request->warehousequantity;
            $data->save();
            
            //return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
            //return response()->json($data);
            return redirect()->back()->with('success','Product Quantity Updated Successfully');
        }
    }
    public function readProduct(Request $req)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function readProductAcc(Request $req)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function viewProduct($id)
    {
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        //dd ($dataProductquantity);
        return view('admin.product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }

    public function viewBranchProduct($id)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->where('branch_id','=',$dataBranch->branch_id)->with('product')->get();
        //dd ($dataProductquantity);
        return view('cashier.product', compact('dataProduct','dataBranch','dataProductquantity'));
        
    }
    public function viewProductAcc($id)
    {
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        
    }
    public function readProductAssistant(Request $req)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('assistant.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function viewProductAssistant($id)
    {
        $dataProduct = Product::where('id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        //dd ($dataProductquantity);
        return view('assistant.product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function editProduct(Request $req)
    {
        $data = Product::find($req->id);
        $data->product_name = $req->product_name; 
        $data->description = $req->description; 
        $data->save();

        return response()->json($data);
    }
    public function deleteProduct(Request $req)
    {
        Product::find($req->id)->delete();

        return response()->json();
    }
}
