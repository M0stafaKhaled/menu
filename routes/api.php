<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/menu','MenuDetailsController@index');
Route::post('/reg','AuthController@register');
Route::get('/s' , 'itemController@index');
Route::get('test','Test');
Route::get('/order/{id}','OrderController@index');
Route::post('/createOrderItem','OrderController@createOrderItem');
Route::get('ds','OrderController@test');
Route::get('/submit/{id}','OrderController@submitOrder')->name('submit');
Route::get('/getOrder/{token}','OrderController@get_order');
Route::get('/getOrderItem/{token}','OrderController@getOrderItem');
Route::get('/update/{token}','OrderController@updateQuantity');
Route::get('/des/{token}','OrderController@decreaseQuantity');
Route::get('/cancel/{id}','kitchenController@cancel');
Route::get('/finish/{id}','kitchenController@finish');
Route::get('/processing/{id}','kitchenController@processing');
Route::get('/tableCheck/{table}','OrderController@TableHasOrder')->name('tableCheck');
Route::get('/HasPassword/{table}' , 'TableController@hasPassword');
Route::get('/password/{table}','TableController@password');
Route::post('/password', 'TableController@savePassword');
Route::get('/check/{id}' , 'OrderController@check');
Route::post('/checkPassword','TableController@checkPassword');
Route::post('/time','OrderController@time');
Route::get('/tos','TableController@tos');
Route::get('/remove/{id}','OrderItemController@remove');
Route::get('/tes/{token}', 'OrderController@tes');