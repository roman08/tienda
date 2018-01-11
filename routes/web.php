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

Route::get('/', 'ProductsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//detalle del producto
Route::name('product.show')->get('/product/detalle/{id}','ProductsController@show');
Route::name('category.show')->get('/category/detalle/{category}','CategoryController@show');

//rutas buscador
Route::name('products.search')->get('/productos/search','SearchController@show');
Route::name('products.json')->get('/productos/json','SearchController@data');

Route::name('producto.carrito')->post('/producto/agregar/carrito','CartDetailController@store');
Route::name('product.cart.delete')->delete('/product/{id}/cart/delete','CartDetailController@destroy'); //form eliminar
Route::name('carrito.orden')->post('/orden','CartController@update');
/**
 * Rutas productos
 */

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
	//RUTAS PRODUCTOS
	Route::name('product.index')->get('/products','AdminProductController@index');//listado
	Route::name('product.create')->get('/products/create', 'AdminProductController@create'); //crear
	Route::name('product.store')->post('/products','AdminProductController@store'); //guarda
	Route::name('product.edit')->get('/products/{id}/edit','AdminProductController@edit'); //formulario edición
	Route::name('product.update')->post('/products/{id}/update','AdminProductController@update'); //actualizar
	Route::name('product.delete')->delete('/products/{id}','AdminProductController@destroy'); //delete
	Route::name('product.image')->get('/product/{id}/images','ImageController@index'); //listado de imagenes
	Route::name('product.image.create')->post('/product/{id}/images','ImageController@store'); //registrar imagen
	Route::name('product.image.delete')->delete('/product/{id}/images','ImageController@destroy'); //form eliminar
	Route::name('product.image.destacar')->get('/product/{id}/images/select/{image}','ImageController@select'); //destacar iamgen

	//RUTAS CARTEGORIAS
	Route::name('category.index')->get('/category','CategoryController@index');//listado
	Route::name('category.create')->get('/category/create', 'CategoryController@create'); //crear
	Route::name('category.store')->post('/category','CategoryController@store'); //guarda
	Route::name('category.edit')->get('/category/{category}/edit','CategoryController@edit'); //formulario edición
	Route::name('category.update')->post('/category/{category}/update','CategoryController@update'); //actualizar
	Route::name('category.delete')->delete('/category/{category}','CategoryController@destroy'); //delete

});

