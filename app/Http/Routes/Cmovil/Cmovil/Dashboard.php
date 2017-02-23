<?php

Route::group(['middleware' => 'access.routeNeedsProduct:cmovil'], function () {

	Route::get('dashboard', 'DashboardController@index')->name('cmovil.dashboard');    

});
