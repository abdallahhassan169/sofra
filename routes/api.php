<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prifix'=>'api'],function(){
    Route::get('cities','api\ClientController@cities');
    Route::get('areas','api\ClientController@areas');
    Route::get('restaurants','api\ClientController@restaurants');
    Route::get('orderDetails','api\ClientController@orderDetails');
    Route::get('restaurant_comments','api\ClientController@restaurantComments');
    Route::get('restaurantDetails','api\ClientController@restaurantDetails');
    Route::get('orderDetails','api\ClientController@orderDetails');
    Route::get('mealDetails','api\ClientController@mealDetails');
    Route::get('meals','api\ClientController@meals');
    Route::post('contactCreate','api\ClientController@contactCreate');
    Route::get('currentorders','api\ClientController@currentOrders');
    Route::get('lastorders','api\ClientController@lastOrders');
    Route::post('orderCreate','api\ClientController@orderCreate');
    Route::get('restaurant-types','api\ClientController@restaurantTypes');
    Route::get('restaurant-current-orders','api\sellerController@currentOrders');
    Route::get('restaurant-last-orders','api\sellerController@lastOrders');
    Route::post('clientRegister','api\AuthController@clientRegister');
    Route::post('clientLogin','api\AuthController@clientLogin');
    Route::post('sellerRegister','api\AuthController@sellerRegister');
    Route::post('sellerLogin','api\AuthController@sellerLogin');
    Route::post('sellerEmailSending','api\AuthController@sellerEmailSending');
    Route::post('clientEmailSending','api\AuthController@clientEmailSending');
    Route::get('client-profile','api\ClientController@clientProfile');
    Route::post('edit-client-profile','api\ClientController@editClientProfile');
    Route::get('seller-profile','api\sellerController@sellerProfile');
    Route::post('edit-seller-profile','api\ClientController@editSellerProfile');



















});
