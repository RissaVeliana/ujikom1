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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filter/{id}', 'JenisController@filter');



Route::group(['middleware' => 'web'], function() {
	Route::group(['prefix'=>'admin','middleware'=>['auth', 'role:admin']], function(){
		Route::resource('/jenis','JenisController');
		Route::resource('/supplier','SupplierController');
		Route::resource('/barang','BarangController');
		Route::resource('/pembelian','PembelianController');
		Route::resource('/penjualan','PenjualanController');
		
});
});