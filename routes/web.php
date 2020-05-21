<?php

use App\Repositories\Orders\OrdersRepository;
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

//урл погоды
Route::get('/','ShowWeatherController@index')->name('weather');

//урлы заказов
Route::get('/orders/{sort?}','OrdersController@index')
    ->name('orders')
    ->where(['sort' => implode(
        '|',
        array_keys(OrdersRepository::getTabs())
    )]);

Route::get('/orders/{id}/edit','OrdersController@edit')->name('orders.edit');
Route::post('/orders/{id}/update','OrdersController@update')->name('orders.update');

//урлы продуктов
Route::get('/products', 'ProductsController@index')
    ->name('products');

Route::post('/products/{id}/update', 'ProductsController@update');
