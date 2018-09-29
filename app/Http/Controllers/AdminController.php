<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Brand;
use App\Branch;
use App\Booking;
use App\Productquantity;
use App\Product;
use App\Purchase;
use App\Dealerspackageorder;
use App\Transport;
use App\Tagging_tag;
Use DB;


use App\User;

class AdminController extends Controller
{
    //
    public function index(){
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $reportPurchase = Purchase::with('cashier')->take(10)->latest()->get();
        //$dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->take(10)->get();
        $dataProduct = Product::all();
        $dataBranch = Branch::with('products')->get();
        $dataTransport = Transport::orderBy('id', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('DailySales','TotalSales','dataProduct', 'reportPurchase', 'dataTransport','dataBranch','dataProductQuantity'));
    }
    public function shop(){
        return view('admin.shop');
    }
    public function request(){
        return view('admin.request');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function members(){
        $dataUser = User::where('usertype', '=', 'customer')->get();
        return view('admin.members',compact('dataUser'));
    }

    public function report()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '=', date('Y-m-d'))->get();
        $reportDealerspackageorder = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->with('dealer')->get();
        $reportTransport = Transport::where('status','=', '1')->get();
        //dd($reportDealerspackageorder);
        $TotalSalesWalkin = Purchase::sum('amount');
        $TotalSalesDealers = Dealerspackageorder::sum('packageprice');
        $TotalSales = $TotalSalesWalkin + $TotalSalesDealers;
        
        
        $TotalYearlyWalkin = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalYearlyDealers = Dealerspackageorder::whereYear('created_at', date('Y'))->sum('packageprice');
        $TotalYearlySales =  $TotalYearlyWalkin + $TotalYearlyDealers;

        $TotalMonthlyWalkin = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $TotalMonthlyDealers = Dealerspackageorder::whereMonth('created_at', '=', date('m'))->sum('packageprice');
        $TotalMonthlySales =  $TotalMonthlyWalkin + $TotalMonthlyDealers;

        $DailySalesWalkin = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
        $DailySalesDealers = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->sum('packageprice');
        $DailySales = $DailySalesWalkin + $DailySalesDealers;
        return view('admin.reports',compact('reportDealerspackageorder','dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'reportTransport','TotalYearlySales','TotalMonthlySales'));
    }
    public function dealersreport()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '=', date('Y-m-d'))->get();
        $reportDealerspackageorder = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->with('dealer')->get();
        $reportTransport = Transport::where('status','=', '1')->get();
        //dd($reportDealerspackageorder);
        $TotalSales = Dealerspackageorder::sum('packageprice');
        $TotalYearlySales = Dealerspackageorder::whereYear('created_at', date('Y'))->sum('packageprice');
        $TotalMonthlySales = Dealerspackageorder::whereMonth('created_at', '=', date('m'))->sum('packageprice');
        $DailySales = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->sum('packageprice');
       
        return view('admin.dealersreport',compact('reportDealerspackageorder','dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'reportTransport','TotalYearlySales','TotalMonthlySales'));
    }
    public function salesreport()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '=', date('Y-m-d'))->get();
        $reportDealerspackageorder = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->with('dealer')->get();
        $reportTransport = Transport::where('status','=', '1')->get();
        //dd($reportDealerspackageorder);
        $TotalSales = Purchase::sum('amount');
        
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');

        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
      
        return view('admin.salesreport',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'reportTransport','TotalYearlySales','TotalMonthlySales'));
    }
    public function reportrange(Request $request){
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '>=', $request->from)
        ->where('date', '<=', $request->to)
        ->get();
        $reportTransport = Transport::where('created_at', '>=', $request->from)
        ->where('created_at', '<=', $request->to)
        ->where('status','=', '1')
        ->get();
        $TotalSales = Purchase::sum('amount');
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('admin.reports',compact('reportPurchase', 'dataBranch' ,'TotalSales', 'DailySales', 'reportTransport','TotalYearlySales','TotalMonthlySales'));
    }

    public function reportbranch($branchid){
        $getBranch = Branch::where('id', '=',$branchid)->first();
        $dataBranch = Branch::get();
        $reportDealerspackageorder = Dealerspackageorder::where('created_at', '>=', date('Y-m-d'))->where('branchid', '=', $branchid)->with('dealer')->get();
        $reportPurchase = Purchase::where('cashier_id','=', $getBranch->cashier_id)
        ->get();
        $reportTransport = Transport::where('status','=', '1')
        ->get();
        $TotalSales = Purchase::sum('amount');
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('admin.reports',compact('reportDealerspackageorder','reportPurchase', 'dataBranch' ,'TotalSales', 'DailySales','reportTransport','TotalYearlySales','TotalMonthlySales'));
    }
    public function settings(){
        
        $dataCategory = Category::take(10)->get();
        $dataSupplier = Supplier::take(10)->get();
        $dataBrand = Brand::take(10)->get();
        
        $dataBranch = Branch::with('cashier')->take(10)->get();
        //dd($dataBranch);
        $dataUser = User::take(10)->get();

        return view('admin.settings',compact('dataCategory', 'dataSupplier', 'dataBrand', 'dataUser', 'dataBranch'));
    }
    public function categories(){
        return view('admin.categories');
    }
    public function users(){
        return view('admin.users');
    }
    public function suppliers(){
        return view('admin.suppliers');
    }
    public function brands(){
        return view('admin.brands');
    }

    public function tags(){
        $dataTags = Tagging_tag::all();
        return view('admin.tags', compact('dataTags'));
    }
}
