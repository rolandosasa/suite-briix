<?php
Route::group(['middleware' => 'access.routeNeedsProduct:crecursos'], function () {

	Route::get('dashboard', 'DashboardController@index')->name('crecursos.dashboard');

});