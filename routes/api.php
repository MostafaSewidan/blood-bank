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
*/        // namespace start with Api folder , prefix  make the link = example.com/api/<v1>/<any Route>

Route::group(['namespace'=>'Api','prefix'=>'v1'],function(){

    Route::post('login' , 'authController@login');
    Route::post('register' , 'authController@register');
    Route::post('send_pinCode' , 'authController@send_pinCode');
    Route::post('reset_password' , 'authController@reset_password');
    Route::get('blood_type' , 'mainController@blood_type');
    Route::get('governorate' , 'mainController@governorate');
    Route::get('cities' , 'mainController@cities');

    Route::group(['middleware'=>'auth:client'],function ()
    {
        Route::get('app_sting' , 'mainController@app_sting');
        Route::get('category' , 'mainController@category');
        Route::post('add_contact' , 'mainController@add_contact');
        Route::get('show_contacts' , 'mainController@show_contacts');
        Route::post('update_profile' , 'authController@update_profile');
        Route::get('posts' , 'mainController@posts');
        Route::get('fetch_post' , 'mainController@fetch_post');
        Route::get('favorite_post' , 'mainController@favorite_post');
        Route::get('show_favorite_post' , 'mainController@show_favorite_post');
        Route::post('donation_request' , 'mainController@donation_request');
        Route::get('show_donation_requests' , 'mainController@show_donation_requests');
        Route::get('fetch_donation_request' , 'mainController@fetch_donation_request');
        Route::post('notification_sting' , 'mainController@notification_sting');

    });
});