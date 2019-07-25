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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'HomeController@index');
Route::get('/', 'Compra\ProductController@index');


Route::resource('pedido', 'Compra\OrderController');

Route::get('checkout/{idPedido}', 'Compra\OrderController@checkout')->name('checkout');

Route::get('novo/pedido/{idProduto}', 'Compra\OrderController@newOrder')->name('novo.pedido');
Route::post('novo/pedido', 'Compra\OrderController@qtdProduct')->name('quantidade.produto');

// rotas do admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('produtos', 'Compra\ProductController');
    Route::get('produtos/', 'Compra\ProductController@indexAdmin')->name('produtos');
});


