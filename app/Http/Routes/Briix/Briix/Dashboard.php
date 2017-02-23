<?php

Route::group(['middleware' => 'access.routeNeedsProduct:briix'], function () {

	Route::get('dashboard', 'DashboardController@index')->name('briix.dashboard');    

});
