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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/place-order', 'OrderController@view');
    Route::get('/sub-category', 'OrderController@getSubCategories');
    Route::post('/order', 'OrderController@placeOrder');
    Route::get('/place-my-order', 'OrderController@placeMyOrder');
    Route::get('/cal-cost', 'OrderController@getDetailsToCalculateCost');
    Route::get('/get-material-image', 'OrderController@getMaterialImage');

    Route::get('waiting-orders', 'AdminController@waitingOrders');
    Route::get('/orders', 'AdminController@listOrders');
    Route::get('/approved-orders', 'AdminController@listApprovedOrders');
    Route::get('/rejected-orders', 'AdminController@listRejectedOrders');
    Route::get('order/{id}', 'AdminController@showOrder');
    Route::post('order/{id}/approve', 'AdminController@approveOrder');
    Route::post('order/{id}/reject', 'AdminController@rejectOrder');
    Route::post('order/{id}/complete', 'AdminController@completeOrder');
    Route::get('edit-and-approve-order/{id}', 'AdminController@editAndApproveOrder');
    Route::post('make-payment', 'OrderController@makePayment');  //OrderController

    Route::resource('categories', 'CategoriesController');
    Route::resource('sub-categories', 'SubCategoryController');
    
    Route::post('level/create', 'InventoryController@addLevel');
    Route::resource('inventories', 'InventoryController');
    Route::get('inventories-items/{id}', 'InventoryController@listItems');
    Route::get('add-stock', 'InventoryController@addItems');

    Route::resource('measurements', 'MeasurementController');
    Route::resource('materials', 'MaterialController');

});
