<?php
Route::group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () {

	Route::get('dashboard', 'DashboardController@index')->name('cpanel.dashboard');

});