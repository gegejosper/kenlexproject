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
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class StocksController extends Controller
{
    //
    public function stocks()
    {
        $dataProduct = Product::with('distributionrecord', 'productquantities')->get();
        $dataProductquantity = Productquantity::with('product')->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        //dd($dataProductquantity);
        return view('admin.stocks', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity')); 
        
        //return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
    }
    public function stocksAcc()
    {
        $dataProduct = Product::with('distributionrecord', 'productquantities')->get();
        //dd($dataProduct);
        $dataProductquantity = Productquantity::with(['product'])->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.stocks', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity')); 
    }
    public function stocksAssistant(){
        $dataProduct = Product::all();
        $dataProductquantity = Productquantity::with('tagged')->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('assistant.stocks', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity')); 
    }
    public function outofstocks(){
        $dataBranch = Branch::get();
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->get();
        return view('admin.outofstocks', compact('dataProduct','dataBranch','DailySales', 'TotalSales'));
    }
    public function outofstocksAcc(){
        $dataBranch = Branch::get();
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->get();
        return view('accounting.outofstocks', compact('dataProduct','dataBranch','DailySales', 'TotalSales'));
    }
    public function outofstocksAssistant(){
        $dataBranch = Branch::get();
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->get();
        return view('assistant.outofstocks', compact('dataProduct','dataBranch','DailySales', 'TotalSales'));
    }
}
