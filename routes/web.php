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

Route::get('/', function () {
    return redirect('login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hash' , function(){return \Illuminate\Support\Facades\Hash::make('11111111');});

Route::group(['middleware'=>'auth'],function (){
    Route::group(['namespace'=>'AdminlteControllers'],function() {

        Route::get('/reset', 'resetPasswordController@index');
        Route::post('/reset', 'resetPasswordController@reset');

        /***************************(   governorate routes  )***************************/

        Route::get( '/create' , function (){ return view('adminDashBord.governrate.create');});
        Route::get('/governorate' ,'governorateController@index');

        Route::get('/destroy/{id}' ,'governorateController@destroy');

        Route::post('/store' ,'governorateController@store');


        Route::get('/edit_form/{id}' ,'governorateController@edit_form');
        Route::post('/edit/{id}' ,'governorateController@edit');


        /************************************.******************************************/


        /***************************(   city routes  )***************************/

        Route::get('/city' ,'citiesController@index');

        Route::post('/city_governotate' ,'citiesController@city_governotate');
        Route::post('/city_name' ,'citiesController@city_name');

        Route::get('/destroy_city/{id}' ,'citiesController@destroy');

        Route::get( '/create_city' , function (){
            $governorates = \App\Models\Governorate::all();
            return view('adminDashBord.cities.create',compact('governorates'));
        });
        Route::post('/store_city' ,'citiesController@store');

        Route::get('/edit_form_city/{id}' ,'citiesController@edit_form');
        Route::post('/edit_city/{id}' ,'citiesController@edit');

        /************************************.******************************************/


        /***************************(   category routes  )***************************/

        Route::get( '/create_category' , function (){ return view('adminDashBord.category.create');});
        Route::get('/category' ,'categoryController@index');

        Route::get('/destroy_category/{id}' ,'categoryController@destroy');

        Route::post('/store_category' ,'categoryController@store');

        Route::get('/edit_category_form/{id}' ,'categoryController@edit_form');
        Route::post('/edit_category/{id}' ,'categoryController@edit');

        Route::post('/category_name' ,'categoryController@category_name');

        /************************************.******************************************/


        /***************************(   client routes  )***************************/

        Route::get('/client' ,'clientController@index');
        Route::get('/manage_client/{id}' ,'clientController@manege_client');
        Route::get('/delete_client/{id}' ,'clientController@delete');
        Route::get('/block/{id}' ,'clientController@block');


        Route::post('/client_name' ,'clientController@client_name');
        Route::post('/client_governotate' ,'clientController@client_governotate');

        /************************************.******************************************/


        /***************************(   posts routes  )***************************/

        Route::get('/posts' ,'postsController@index');
        Route::post('/post_word' ,'postsController@post_word');
        Route::post('/category_post' ,'postsController@category_post');
        Route::get('/favorite_post/{id}' ,'postsController@favorite_post');
        Route::get('/create_post' , function (){return view('adminDashBord.posts.create');});
        Route::post('/store_post' ,'postsController@store_post');
        Route::get('/destroy_post/{id}' ,'postsController@destroy_post');

        /************************************.******************************************/

        /***************************(   contacts route  )***************************/

        Route::resource('contacts' , 'contactsController');
        Route::post('/contacts/search' , 'contactsController@search');

        /************************************.******************************************/


        /***************************(   app_settings route  )***************************/

        Route::get('/app_settings' , 'app_settingsController@index');
        Route::post('/app_settings/edit' , 'app_settingsController@edit');

        /************************************.******************************************/


        /***************************(   contacts route  )***************************/

        Route::resource('donations' , 'donation_requestController');
        Route::post('/donations/search' , 'donation_requestController@search');

        /************************************.******************************************/
    });
});
