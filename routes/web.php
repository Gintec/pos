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
//Home controller
use App\User;

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
        // $user_info = User::find(Auth::id())->with('personnels')->first();
        return view('index');
    });
    Route::resource('add_sales', 'SalesController');

    Route::get('view_sales', 'SalesController@view_sales');

    Route::get('today_sales', 'SalesController@today_sales');

    Route::get('reciept/{invoice_no}', 'SalesController@reciept');

    // Rosource::post('confirm_sale', 'ProductsController@create')->name('confirm_sale');

    
    
    //personnel controller
    Route::resource('personnels', 'PersonnelController');
    
    //Products Controller
    Route::get('/add_product', 'ProductsController@create');

    Route::resource('/suppliers', 'SuppliersController');
    Route::get('/add_supplier', 'SuppliersController@create');

    Route::resource('products', 'ProductsController');
    Route::post('product_search', 'ProductsController@search');
    Route::get('product/{product_id}', 'ProductsController@edit_product');

    Route::get('add_customer', 'CustomersController@create')->name('add_customer');
    Route::resource('customers', 'CustomersController');
    Route::get('contact_customers', 'CustomersController@contact_customers');
    Route::post('send_message', 'CustomersController@send_message')->name('send_message');
    Route::resource('customercategories', 'CustomercategoriesController');
    Route::resource('customergroups', 'CustomergroupsController');

    Route::resource('inventory', 'InventoryController');
    

    Route::resource('company', 'CompanyController');
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('returneds', 'ReturnedController');
    Route::get('return_item/{id}', 'ReturnedController@return_item');
    Route::get('return_stock/{quantity_returned}/{product_id}/{id}', 'ReturnedController@return_stock');

    Route::get('gen_barcode/{product_id}/{quantity}', 'InventoryController@gen_barcode');

    Route::get('customer_purchases/{customer_id}', 'InvoicesController@customer_purchases');

    Route::get('invoice/{invoice_no}', 'SalesController@invoice')->name('invoice');


    // Debt Routing
    Route::resource('debts', 'DebtsController');
    Route::get('repay_debt/{id}', 'DebtsController@repay_debt');

    // LOGOUT
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::get('/pos_admin', 'PosadminController@index');
        Route::get('/add_personnel', 'PersonnelController@create');
        Route::get('restock/{product_id}', 'StockController@restock');
        Route::get('setup_company/{id}', 'CompanyController@index');

    });
    
});
Auth::routes();
Route::resource('/home', 'SalesController');
