<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/booking', 'HomeController@booking')->name('booking');
Route::post('/submitbooking', 'BookingController@submitbooking')->name('submitbooking');
Route::get('/admin', 'AdminController@login')->name('admin');
Route::get('/tags/{slug}', 'HomeController@slug')->name('slug');
Route::get('/category/{id}', 'HomeController@category')->name('category');
Route::get('/brand/{id}', 'HomeController@brand')->name('brand');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/session', 'HomeController@session')->name('session');
Route::get('/userregister', 'HomeController@register')->name('register');
Route::get('/user', 'HomeController@register')->name('register');
Route::get('/error', 'HomeController@errortoken')->name('errortoken');

Route::post('/cart/addproducts', 'CartController@addProducts')->name('cart');
Route::get('/cart', 'CartController@viewCart')->name('viewCart');
//Route::group(['middleware' =>'genUserAuth'], function(){ 
    Route::post('/cart/reserve', 'CartController@reserveOrder')->name('reserveOrder');
    
//});

Route::post('/cart/updatequantity', 'CartController@updateQuantity')->name('updateQuantity');
Route::get('/cart/deleteproduct/{id}', 'CartController@deleteproduct')->name('deleteproduct');

Route::get('/product', 'HomeController@shop')->name('product');
Route::get('/product/{id}', 'CartController@viewProduct')->name('viewcartProduct');

Route::get('/shop', 'HomeController@shop')->name('shop');
Route::post('/admin/login', 'LoginController@adminLogin')->name('admin.login');
Route::post('/cashier/login', 'LoginController@cashierLogin')->name('cashier.login');
Route::post('/assistant/login', 'LoginController@assistantLogin')->name('assistant.login');
Route::post('/customer/login', 'LoginController@customerLogin')->name('customer.login');
Route::post('/accounting/login', 'LoginController@accountingLogin')->name('accounting.login');
Route::get('/cashier', 'LoginController@cashier')->name('cashier');
Route::get('/oic', 'LoginController@oic')->name('oic');
Route::get('/accounting', 'LoginController@accounting')->name('accounting');
Route::get('/assistant', 'LoginController@assistant')->name('assistant');
Route::get('/customer', 'LoginController@customer')->name('customer');
Route::group(['middleware' =>'adminAuth','prefix' => 'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/shop', 'AdminController@shop')->name('shop');
    Route::get('/request', 'AdminController@request')->name('request');
    Route::get('/members', 'AdminController@members')->name('members');
    
    Route::get('/report', 'AdminController@report')->name('report');
    Route::get('/report/sales', 'AdminController@salesreport')->name('salesreport');
    Route::get('/report/dealers', 'AdminController@dealersreport')->name('dealersreport');
    Route::get('/report/branch/{branchid}', 'AdminController@reportbranch')->name('reportbranch');
    Route::post('/report/generate', 'AdminController@reportrange')->name('reportrange');
    
    //Route::get('/branchs', 'AdminController@branchs')->name('branchs');
    Route::get('/settings', 'AdminController@settings')->name('settings');
    Route::get('/tags', 'AdminController@tags')->name('tags');

    Route::get('/transports', 'TransportController@readTransport')->name('transports');
    Route::get('/transports/{id}', 'TransportController@viewTransport')->name('viewTransport');
    Route::post('/transports/approve', 'TransportController@approveTransport')->name('approveTransport');
    Route::post('/transports/disapprove', 'TransportController@disapproveTransport')->name('disapproveTransport');
    Route::post('/transports/cancel', 'TransportController@cancelTransport')->name('cancelTransport');
    Route::post('/transports/delete', 'TransportController@deleteTransport')->name('deleteTransport');

    Route::get('/branchs', 'BranchsController@readBranch')->name('branchs');
    Route::get('/branchs/{id}', 'BranchsController@viewBranch')->name('viewBranch');
    Route::get('/branch/users/{id}', 'BranchsController@viewBranchUser')->name('viewBranchUser');
    Route::get('/branch/stocks/{id}', 'BranchsController@viewBranchStocks')->name('viewBranchStocks');
    Route::get('/branch/packages/{id}', 'BranchsController@viewBranchPackages')->name('viewBranchPackages');
    Route::get('/branch/dealers/{branchid}', 'DealersController@viewBranchDealers')->name('viewBranchDealers');
    Route::get('/dealers/{id}', 'DealersController@showdealersAdmin')->name('showdealersAdmin');   
    Route::get('/branch/packages/add/{branchid}/{packageid}', 'BranchsController@addBranchPackage')->name('addBranchPackage');
    Route::get('/branch/stocks/add/{branchid}/{productid}', 'BranchsController@addBranchProduct')->name('addBranchProduct');

    Route::post('/branchs/addbranchs', 'BranchsController@addBranch')->name('addbranchs');
    Route::post('/branchs/editbranchs', 'BranchsController@editBranch')->name('editbranchs');
    Route::post('/branchs/deletebranchs', 'BranchsController@deleteBranch')->name('deletebranchs');

    Route::get('/users', 'UsersController@readUser')->name('users');   
    Route::get('/users/{id}', 'UsersController@showUser')->name('showusers');   
    Route::post('/users/addusers', 'UsersController@addUser')->name('addusers');
    Route::post('/users/editusers', 'UsersController@editUser')->name('editusers');
    Route::post('/users/deleteusers', 'UsersController@deleteUser')->name('deleteusers');

    Route::get('/packages', 'PackageController@readpackages')->name('packages');   
    Route::get('/packages/{id}', 'PackageController@showpackages')->name('showpackages');   
    Route::post('/packages/addpackageitem', 'PackageController@addpackageitem')->name('addpackageitem');
    Route::post('/packages/addpackages', 'PackageController@addpackages')->name('addpackages');
    Route::post('/packages/editpackages', 'PackageController@editpackages')->name('editpackages');
    Route::post('/packages/editbranchpackage', 'PackageController@editBranchpackages')->name('editBranchpackages');
    Route::post('/packages/deletepackages', 'PackageController@deletepackages')->name('deletepackages');
    

    Route::post('/branchusers/addbranchusers', 'UsersController@addbranchusers')->name('addbranchusers');
    Route::post('/branchusers/editbranchusers', 'UsersController@editbranchusers')->name('editbranchusers');

    Route::get('/subscriber/add', 'SubscribersController@add')->name('add');
    Route::post('/subscriber/addsubscriber', 'SubscribersController@addSubscriber')->name('addSubscriber');
    Route::get('/subscribers', 'SubscribersController@viewSubscribers')->name('viewSubscribers');
    Route::get('/branch/subscribers/{branchid}', 'SubscribersController@viewBranchSubscribers')->name('viewBranchSubscribers');
    Route::get('/subscribers/{boxid}', 'SubscribersController@showSubscriberAdmin')->name('showusers');  

    Route::get('/categories', 'CategoriesController@readCategory')->name('categories');
    Route::post('/categories/addcategories', 'CategoriesController@addCategory')->name('addcategories');
    Route::post('/categories/editcategories', 'CategoriesController@editCategory')->name('editcategories');
    Route::post('/categories/deletecategories', 'CategoriesController@deleteCategory')->name('deletecategories');
    
    Route::get('/brands', 'BrandsController@readBrand')->name('brands');
    Route::post('/brands/addbrands', 'BrandsController@addBrand')->name('addbrands');
    Route::post('/brands/editbrands', 'BrandsController@editBrand')->name('editbrands');
    Route::post('/brands/deletebrands', 'BrandsController@deleteBrand')->name('deletebrands');

    Route::get('/suppliers', 'SuppliersController@readSupplier')->name('suppliers');
    Route::post('/suppliers/addsuppliers', 'SuppliersController@addSupplier')->name('addsuppliers');
    Route::post('/suppliers/editsuppliers', 'SuppliersController@editSupplier')->name('editsuppliers');
    Route::post('/suppliers/deletesuppliers', 'SuppliersController@deleteSupplier')->name('deletesuppliers');

    Route::get('/products', 'ProductController@readProduct')->name('readProduct');
    Route::get('/products/{id}', 'ProductController@viewProduct')->name('viewProduct');
    Route::get('/product/{id}', 'ProductQuantityController@viewProductDetails')->name('viewProductDetails');
    Route::get('/product/edit/{id}', 'ProductQuantityController@editProductDetails')->name('editProductDetails');
    Route::post('/products/addproducts', 'ProductController@addProduct')->name('addproducts');
    Route::post('/products/editproducts', 'ProductController@editProduct')->name('editproducts');

    Route::post('/products/addproductquantity', 'ProductQuantityController@addProductQuantity')->name('addproductquantity');
    Route::post('/products/editproductquantity', 'ProductQuantityController@updateProductQuantity')->name('updateProductQuantity');

    Route::get('/stocks', 'StocksController@stocks')->name('stocks');
    Route::get('/outofstocks', 'StocksController@outofstocks')->name('outofstocks');

    Route::get('/purchase', 'PurchaseController@readPurchase')->name('purchase');
    Route::post('/createpurchase', 'PurchaseController@createpurchase')->name('createpurchase');
    Route::get('/createpurchase/{purchasenumber}', 'PurchaseController@createpurchaserequest')->name('createpurchaserequest');
    Route::post('/purchase/search', 'PurchaseController@productSearch')->name('productSearch');
    Route::post('/purchase/addquantity', 'PurchaseController@addQuantity')->name('addQuantity');
    Route::post('/purchase/recievequantity', 'PurchaseController@recievequantity')->name('recievequantity');
    Route::post('/purchase/addquantityrequest', 'PurchaseController@addQuantityRequest')->name('addQuantityRequest');
    Route::post('/purchase/deletequantityrequest', 'PurchaseController@deleteQuantityRequest')->name('deleteQuantityRequest');
    Route::post('/purchase/generatepurchaseorder', 'PurchaseController@generatePurchaseOrder')->name('generatePurchaseOrder');
    Route::get('/purchase/history/{purchasenumber}', 'PurchaseController@purchaseHistory')->name('purchaseHistory');
    Route::get('/purchase/recieved/{purchasenumber}', 'PurchaseController@purchaseRecieved')->name('purchaseRecieved');
});
Route::group(['middleware' =>'cashierAuth','prefix' => 'cashier'], function(){ 
    Route::get('/dashboard', 'CashierController@index')->name('dashboard');
    Route::get('/orders', 'CashierController@orders')->name('orders');
    Route::get('/receiving', 'CashierController@receiving')->name('receiving');
    Route::get('/receiving/{drnumber}', 'CashierController@receivingdetails')->name('receivingdetails');
    Route::post('/receiving/stocks', 'CashierController@receivingstocks')->name('receivingstocks');
    Route::post('/updateprice', 'CashierController@updateprice')->name('updateprice');
    Route::get('/orders/{requestId}', 'CashierController@viewOrders')->name('viewOrders');
    Route::get('/receiving/recieved/{drnumber}', 'CashierController@deliveryRecieved')->name('deliveryRecieved');
    Route::get('/items', 'CashierController@items')->name('items');
    Route::get('/report', 'CashierController@report')->name('report');

    Route::get('/packages', 'PackageController@branchreadpackages')->name('branchpackages');   
    Route::get('/packages/{id}', 'PackageController@branchshowpackages')->name('branchshowpackages');   
    Route::post('/packages/editbranchpackage', 'PackageController@editBranchpackages')->name('editBranchpackages');
    Route::post('/processpackageorder', 'PackageController@processpackageorder')->name('processpackageorder');
    Route::get('/packageprocesssuccess/{boxid}', 'PackageController@packageprocesssuccess')->name('packageprocesssuccess');
    Route::get('/packagenewdealerprocesssuccess/{boxid}/{ordernumber}', 'PackageController@packagenewdealerprocesssuccess')->name('packagenewdealerprocesssuccess');
    Route::get('/packagedealerprocesssuccess/{boxid}/{ordernumber}', 'PackageController@packagedealerprocesssuccess')->name('packagedealerprocesssuccess');


    
    Route::get('/packageorder/{packageid}', 'PackageController@packageorder')->name('packageorder');
    Route::get('/newdealer/{packageid}', 'PackageController@newdealerpackageorder')->name('newdealerpackageorder');
    Route::get('/dealer/{packageid}', 'PackageController@dealerpackageorder')->name('newdealerpackageorder');
    Route::post('/processnewdealerpackageorder', 'PackageController@processnewdealerpackageorder')->name('processnewdealerpackageorder');
    Route::post('/processdealerpackageorder', 'PackageController@processdealerpackageorder')->name('processdealerpackageorder');

    Route::get('/products/{id}', 'ProductController@viewBranchProduct')->name('viewBranchProduct');

    Route::post('/report/generate', 'CashierController@reportrange')->name('reportrange');
    Route::post('/cart/addproducts', 'CashierController@addProducts')->name('addProducts');
    Route::post('/cart/updatequantity', 'CashierController@updateQuantity')->name('cashierupdateQuantity');
    Route::post('/orderupdatequantity', 'CashierController@orderupdatequantity')->name('orderupdatequantity');
    Route::get('/cart/deleteproduct/{id}', 'CashierController@deleteproduct')->name('deleteproduct');
    Route::post('/cart/processOrder', 'CashierController@processOrder')->name('processOrder');
    Route::post('/product/search', 'CashierController@productSearch')->name('productSearch');
    Route::get('/declineorder/{id}/{requestid}', 'CashierController@declineOrder')->name('declineOrder');
    Route::get('/declinereservation/{requestid}', 'CashierController@declineReservation')->name('declineReservation');

    Route::get('/subscribers', 'SubscribersController@subscribersAcc')->name('subscribersAcc');
    Route::get('/subscribers/{boxid}', 'SubscribersController@showSubscriber')->name('showusers');  
    Route::post('/subscribers/activate/', 'CustomerController@activateUser')->name('activateUser');  
    Route::post('/dealers/activate/', 'DealersController@activateUser')->name('activateUser');  
    Route::get('/dealers', 'DealersController@dealersAcc')->name('dealersAcc');
    Route::get('/dealers/{id}', 'DealersController@showdealers')->name('showdealers');   


});
Route::group(['middleware' =>'customerAuth','prefix' => 'subscriber'], function(){ 
    Route::get('/dashboard', 'CustomerController@index')->name('dashboard');
    Route::get('/history', 'CustomerController@history')->name('history');
    Route::get('/orders', 'CustomerController@orders')->name('orders');
    Route::get('/order/{requestId}', 'CustomerController@viewRequestOrder')->name('viewRequestOrder');
    Route::get('/account', 'CustomerController@account')->name('account');
    Route::get('/bookings', 'CustomerController@readBooking')->name('bookings');
    Route::get('/profile/edit/{id}', 'CustomerController@editProfile')->name('editProfile');
    Route::post('/profile/edit', 'CustomerController@editProfileproc')->name('editProfileproc');
    Route::get('/changepass/{id}', 'CustomerController@changepass')->name('changepass');
    Route::post('/changepass/proc', 'CustomerController@changepassproc')->name('changepassproc');
    Route::post('/updatepic', 'CustomerController@editProfilePic')->name('editProfilePic');
    Route::get('/bookings/{id}', 'CustomerController@viewBooking')->name('viewBooking');
    Route::get('/deleteorder/{requestid}', 'CartController@deleteOrder')->name('deleteOrder');

});
Route::group(['middleware' =>'oicAuth','prefix' => 'oic'], function(){ 
    Route::get('/dashboard', 'OicController@index')->name('dashboard');
});
Route::group(['middleware' =>'accountingAuth','prefix' => 'accounting'], function(){ 
    Route::get('/dashboard', 'AccountingController@index')->name('dashboard');
    
    Route::get('/report', 'AccountingController@reportacc')->name('reportacc');
    Route::get('/report/branch/{branchid}', 'AccountingController@reportbranchacc')->name('reportbranchacc');
    Route::post('/report/generate', 'AccountingController@reportrangeacc')->name('reportrangeacc');

    Route::get('/subscribers', 'SubscribersController@subscribersAcc')->name('subscribersAcc');
    Route::get('/subscribers/{id}', 'SubscribersController@showSubscriber')->name('showusers');   

    Route::get('/products', 'ProductController@readProductAcc')->name('readProductAcc');
    Route::get('/products/{id}', 'ProductController@viewProductAcc')->name('viewProductAcc');
    Route::get('/product/{id}', 'ProductQuantityController@viewProductDetails')->name('viewProductDetails');

    Route::get('/branchs', 'BranchsController@readBranchAcc')->name('branchsAcc');
    Route::get('/branchs/{id}', 'BranchsController@viewBranchAcc')->name('viewBranchAcc');
    Route::get('/branch/users/{id}', 'BranchsController@viewBranchUserAcc')->name('viewBranchUserAcc');
    Route::get('/branch/stocks/{id}', 'BranchsController@viewBranchStocksAcc')->name('viewBranchStocksAcc');
    Route::get('/branch/packages/{id}', 'BranchsController@viewBranchPackagesAcc')->name('viewBranchPackagesAcc');
    Route::get('/branch/packages/add/{branchid}/{packageid}', 'BranchsController@addBranchPackageAcc')->name('addBranchPackageAcc');
    Route::get('/branch/stocks/add/{branchid}/{productid}', 'BranchsController@addBranchProductAcc')->name('addBranchProductAcc');

    Route::get('/packages', 'PackageController@readpackagesAcc')->name('packagesAcc');   
    Route::get('/packages/{id}', 'PackageController@showpackagesAcc')->name('showpackagesAcc');   

    Route::get('/stocks', 'StocksController@stocksAcc')->name('stocksAcc');
    Route::get('/outofstocks', 'StocksController@outofstocksAcc')->name('outofstocksAcc');

    Route::get('/purchase', 'PurchaseController@readPurchaseAcc')->name('purchaseAcc');
    Route::get('/purchase/history/{purchasenumber}', 'PurchaseController@purchaseHistoryAcc')->name('purchaseHistoryAcc');

    Route::get('/distribution', 'DistributionController@readDistribution')->name('readDistribution');
    Route::post('/createdistribution', 'DistributionController@createdistribution')->name('createdistribution');
    Route::get('/distribution/{distributionnumber}', 'DistributionController@distributebranchproduct')->name('createpurchaserequest');
    Route::post('/distribution/adddistributionrecord', 'DistributionController@adddistributionrecord')->name('adddistributionrecord');
    Route::post('/distribution/deletedistributionrecord', 'DistributionController@deletedistributionrecord')->name('deletedistributionrecord');
    Route::get('/distribution/history/{distributionnumber}', 'DistributionController@distributionHistoryAcc')->name('purchaseHistoryAcc');
    Route::post('/distribution/generatedistribution', 'DistributionController@generatedistribution')->name('generatedistribution');
});
// Route::group(['middleware' =>'assistantAuth','prefix' => 'assistant'], function(){ 
//     Route::get('/dashboard', 'AssistantController@index')->name('dashboard');
//     Route::get('/orders', 'AssistantController@orders')->name('orders');
//     Route::get('/orders/{requestId}', 'AssistantController@viewOrders')->name('viewOrders');
//     Route::get('/items', 'AssistantController@items')->name('items');
//     Route::get('/report', 'AssistantController@report')->name('report');
//     Route::post('/report/generate', 'AssistantController@reportrange')->name('reportrange');
//     Route::post('/cart/addproducts', 'AssistantController@addProducts')->name('addProducts');
//     Route::post('/cart/updatequantity', 'AssistantController@updateQuantity')->name('cashierupdateQuantity');
//     Route::post('/orderupdatequantity', 'AssistantController@orderupdatequantity')->name('orderupdatequantity');
//     Route::get('/cart/deleteproduct/{id}', 'AssistantController@deleteproduct')->name('deleteproduct');
//     Route::post('/cart/processOrder', 'AssistantController@processOrder')->name('processOrder');
//     Route::post('/product/search', 'AssistantController@productSearch')->name('productSearch');
//     Route::get('/declineorder/{id}/{requestid}', 'AssistantController@declineOrder')->name('declineOrder');
//     Route::get('/declinereservation/{requestid}', 'AssistantController@declineReservation')->name('declineReservation');

//     Route::get('/bookings', 'BookingController@readBookingAssistant')->name('readBookingAssistant');
//     Route::get('/bookings/{id}', 'BookingController@viewBookingAssistant')->name('viewBookingAssistant');
//     Route::post('/bookings/approve', 'BookingController@approveBooking')->name('approveBooking');
//     Route::post('/bookings/disapprove', 'BookingController@disapproveBooking')->name('disapproveBooking');
//     Route::post('/bookings/delete', 'BookingController@deleteBooking')->name('deleteBooking');

//     Route::get('/transports', 'TransportController@readTransportAssistant')->name('transports');
//     Route::get('/transports/{id}', 'TransportController@viewTransport')->name('viewTransport');
//     Route::post('/transports/approve', 'TransportController@approveTransport')->name('approveTransport');
//     Route::post('/transports/disapprove', 'TransportController@disapproveTransport')->name('disapproveTransport');
//     Route::post('/transports/delete', 'TransportController@deleteTransport')->name('deleteTransport');

//     Route::get('/stocks', 'StocksController@stocksAssistant')->name('stocksAssistant');
//     Route::get('/outofstocks', 'StocksController@outofstocksAssistant')->name('outofstocksAssistant');
// });

// Route::group(['middleware' =>'customerAuth','prefix' => 'customer'], function(){ 
//     Route::get('/dashboard', 'CustomerController@index')->name('dashboard');
//     Route::get('/history', 'CustomerController@history')->name('history');
//     Route::get('/orders', 'CustomerController@orders')->name('orders');
//     Route::get('/account', 'CustomerController@account')->name('account');
//     Route::get('/deleteorder/{id}/{requestid}', 'CartController@deleteOrder')->name('deleteOrder');

// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
