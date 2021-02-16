<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', '\Modules\HomePage\Http\Controllers\HomePageController@index')->name('home');

Auth::routes();

Route::get('/', '\Modules\HomePage\Http\Controllers\HomePageController@index')->name('home');

//Route::group(['middleware' => 'master_toko'], function() {
   Route::get('/master_toko', '\Modules\MasterToko\Http\Controllers\MasterTokoController@index')->name('master_toko');  
   Route::get('/master_toko/create', '\Modules\MasterToko\Http\Controllers\MasterTokoController@create')->name('mastertoko.create');
   Route::get('/master_toko/kategori', '\Modules\MasterToko\Http\Controllers\MasterTokoController@kategori')->name('mastertoko.kategori');
   Route::get('/master_toko/create_kategori', '\Modules\MasterToko\Http\Controllers\MasterTokoController@create_kategori')->name('mastertoko.create_kategori');
   Route::get('/master_toko/satuan', '\Modules\MasterToko\Http\Controllers\MasterTokoController@satuan')->name('mastertoko.satuan');
   Route::get('/master_toko/create_satuan', '\Modules\MasterToko\Http\Controllers\MasterTokoController@create_satuan')->name('mastertoko.create_satuan');
   
   Route::get('/master_toko/update/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@update')->name('mastertoko.update');
   Route::get('/master_toko/update_kategori/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@update_kategori')->name('mastertoko.update_kategori');
   Route::get('/master_toko/satuan_update/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@satuan_update')->name('mastertoko.satuan_update');
   
   Route::get('master_toko/delete/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@delete');
   Route::get('master_toko/delete_kategori/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@delete_kategori');   
   Route::delete('master_toko/delete_satuan/{id}','\Modules\MasterToko\Http\Controllers\MasterTokoController@delete_satuan');

   
   Route::post('/master_toko/simpan','\Modules\MasterToko\Http\Controllers\MasterTokoController@simpan')->name('mastertoko.simpan');   
   Route::post('/master_toko/simpan_kategori','\Modules\MasterToko\Http\Controllers\MasterTokoController@simpan_kategori')->name('mastertoko.simpan_kategori');   
   Route::put('/master_toko/simpan_satuan','\Modules\MasterToko\Http\Controllers\MasterTokoController@simpan_satuan')->name('mastertoko.simpan_satuan');

   Route::post('/master_toko/edit_barang','\Modules\MasterToko\Http\Controllers\MasterTokoController@edit_barang')->name('mastertoko.edit_barang');   
   Route::post('/master_toko/edit_kategori','\Modules\MasterToko\Http\Controllers\MasterTokoController@edit_kategori')->name('mastertoko.edit_kategori');   
   Route::put('/master_toko/edit_satuan','\Modules\MasterToko\Http\Controllers\MasterTokoController@edit_satuan')->name('mastertoko.edit_satuan');






//    Route::group(['middleware' => 'customer'], function() {
//        Route::get('dashboard', 'LoginController@dashboard')->name('customer.dashboard');
//        Route::get('logout', 'LoginController@logout')->name('customer.logout');
//
//        Route::get('orders', 'OrderController@index')->name('customer.orders');
//        Route::get('orders/{invoice}', 'OrderController@view')->name('customer.view_order');
//        Route::get('orders/pdf/{invoice}', 'OrderController@pdf')->name('customer.order_pdf');
//        Route::post('orders/accept', 'OrderController@acceptOrder')->name('customer.order_accept');
//        Route::get('orders/return/{invoice}', 'OrderController@returnForm')->name('customer.order_return');
//        Route::put('orders/return/{invoice}', 'OrderController@processReturn')->name('customer.return');
//
//        Route::get('payment', 'OrderController@paymentForm')->name('customer.paymentForm');
//        Route::post('payment', 'OrderController@storePayment')->name('customer.savePayment');
//
//        Route::get('setting', 'FrontController@customerSettingForm')->name('customer.settingForm');
//        Route::post('setting', 'FrontController@customerUpdateProfile')->name('customer.setting');
//
//        Route::get('/afiliasi', 'FrontController@listCommission')->name('customer.affiliate');
//    });
//});

Route::get('/logout', 'Auth\LoginController@logout');