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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');

# CRUD Kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/add', 'KategoriController@create');
Route::post('/kategori/store', 'KategoriController@store');
Route::get('/kategori/edit/{id}', 'KategoriController@edit');
Route::post('/kategori/update/{id}', 'KategoriController@update');
Route::get('/kategori/hapus/{id}', 'KategoriController@destroy');

# CRUD Transaksi
Route::get('/transaksi', 'TransaksiController@index');
Route::get('/transaksi/add', 'TransaksiController@create');
Route::post('/transaksi/store', 'TransaksiController@store');
Route::get('/transaksi/edit/{id}', 'TransaksiController@edit');
Route::post('/transaksi/update/{id}', 'TransaksiController@update');
Route::get('/transaksi/hapus/{id}', 'TransaksiController@destroy');

# Ajax
Route::post('/ajaxtypes','TransaksiController@show');
Route::post('/search','TransaksiController@search');