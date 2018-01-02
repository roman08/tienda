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

/**
 * Rutas productos
 */
Route::name('product.index')->get('/admin/products','AdminProductController@index');//listado
Route::name('product.create')->get('/admin/products/create', 'AdminProductController@create'); //crear
Route::name('product.store')->post('/admin/products','AdminProductController@store'); //guarda
Route::name('product.edit')->get('/admin/products/{id}/edit','AdminProductController@edit'); //formulario edición
Route::name('product.update')->post('/admin/products/{id}/update','AdminProductController@update'); //actualizar
Route::name('product.delete')->delete('/admin/products/{id}','AdminProductController@destroy'); //delete
