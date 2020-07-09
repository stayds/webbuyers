<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix' => 'v1'], function (){
    Route::post('/register', 'Mobile\BasicController@register');
    Route::post('/access', 'Mobile\BasicController@login');
    Route::post('/user/reset', 'Mobile\ForgetPassController@postForgotten');

    Route::group(['middleware'=>['auth:api','cors']], function(){
        Route::get('email/verify/{id}', 'Mobile\BasicController@verify')->name('verificationapi.verify');
        Route::get('/user', 'Mobile\BasicController@details');
        Route::post('/user/edit', 'Mobile\BasicController@update');

        Route::get('/product/list', 'Mobile\ProductController@index');
        Route::get('/product/detail/{id}', 'Mobile\ProductController@getOrderDetail');
        Route::get('/order/list', 'Mobile\OrderController@getUserOrders');
        Route::post('/order/add', 'Mobile\OrderController@Ordersadd');
        Route::post('/order/pay', 'Mobile\OrderController@payment');
        Route::get('/order/details/{id}', 'Mobile\OrderController@getOrderDetail');
        Route::get('/category/list', 'Mobile\CategoryController@index');
        Route::get('/wishlist', 'Mobile\WishlistController@index');
        Route::get('/wishlist/add/{productid}', 'Mobile\WishlistController@store');
        Route::post('/wishlist/delete', 'Mobile\WishlistController@destory');
        Route::post('/cart/add', 'Mobile\OrderController@tempCarte');
        Route::get('/cart/list', 'Mobile\OrderController@getCartlist');
        Route::post('/discount/code', 'Mobile\ProductController@getDiscount');

        Route::get('/tranx', 'Mobile\OrderController@getTransactRef');


    });

    Route::fallback(function(){
        return response()->json([
            'message' => 'Route Not Found. If error persists, contact the adminstrator'], 404);
    });
});


