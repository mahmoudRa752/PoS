<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function(){

        // Route::get('/login','LoginController@login')->name('login');
        // Route::post('/dologin','LoginController@dologin')->name('dologin');
        Route::get('/index','DashboardController@index')->name('index');
        //user routes
        Route::resource('users','UserController')->except(['show']);

        //category routes
        Route::resource('categories','CategoryController')->except(['show']);

        //product routes
        Route::resource('products','ProductController')->except(['show']);

        //client routes
        Route::resource('clients','ClientController')->except(['show']);
        Route::resource('clients.orders','Clients\OrderController')->except(['show']);

    });

});

Route::get('/logout', 'LoginController@logout')->name('dashboard.logout');
