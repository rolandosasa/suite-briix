<?php

Route::group([
	'middleware' => 'access.routeNeedsProductPermission:view-Panel',
    'prefix'     => 'access',
    'namespace'  => 'Access',
], function() {

	/**
	 * User Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsProductPermission:manage-users',
	], function() {
		Route::group(['namespace' => 'User'], function() {
			Route::resource('user', 'UserController', ['except' => ['show']]);

			/**
			 * For DataTables
			 */
			Route::get('user/get', 'UserController@get')->name('cmovil.access.user.get');

			/**
			 * User Status'
			 */
			Route::get('user/deactivated', 'UserController@deactivated')->name('cmovil.access.user.deactivated');
			Route::get('user/deleted', 'UserController@deleted')->name('cmovil.access.user.deleted');

			/**
			 * Misc
			 */
		
			Route::post('user/client', ['as'=>'select-user','uses'=>'UserController@selectUser']);

			Route::get('account/confirm/resend/{user}', 'UserController@resendConfirmationEmail')->name('cmovil.account.confirm.resend');

			/**
			 * Specific User
			 */
			Route::group(['prefix' => 'user/{user}'], function() {
				Route::get('mark/{status}', 'UserController@mark')->name('cmovil.access.user.mark')->where(['status' => '[0,1]']);
				Route::get('password/change', 'UserController@changePassword')->name('cmovil.access.user.change-password');
				Route::post('password/change', 'UserController@updatePassword')->name('cmovil.access.user.change-password');
				Route::get('login-as', 'UserController@loginAs')->name('cmovil.access.user.login-as');
			});

       /**
        * Deleted User
        */
        Route::group(['prefix' => 'user/{deletedUser}'], function() {
					Route::get('delete', 'UserController@delete')->name('cmovil.access.user.delete-permanently');
          Route::get('restore', 'UserController@restore')->name('cmovil.access.user.restore');
        });
		});
	});

	/**
	 * Role Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-roles',
	], function() {
		Route::group(['namespace' => 'Role'], function () {
			Route::resource('role', 'RoleController', ['except' => ['show']]);

			//For DataTables
			Route::get('role/get', 'RoleController@get')->name('cmovil.access.role.get');
		});
	});

	/**
	 * Enterprise Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-enterprises',
	], function() {
		Route::group(['namespace' => 'Enterprise'], function () {
			Route::resource('enterprise', 'EnterpriseController', ['except' => ['show']]);

			//For DataTables
			Route::get('enterprise/get', 'EnterpriseController@get')->name('cmovil.access.enterprise.get');

			/**
			 * Enterprise Status'
			 */
			Route::get('enterprise/deleted', 'EnterpriseController@deleted')->name('cmovil.access.enterprise.deleted');

			/**
             * Deleted Enterprise
             */
            Route::group(['prefix' => 'enterprise/{deletedEnterprise}'], function() {
				Route::get('delete', 'EnterpriseController@delete')->name('cmovil.access.enterprise.delete-permanently');
                Route::get('restore', 'EnterpriseController@restore')->name('cmovil.access.enterprise.restore');
            });
		});
	});

	/**
	* Line Management
	*/

	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-lines',
	], function() {
		Route::group(['namespace' => 'Line'], function () {
			Route::resource('line', 'LineController', ['except' => ['show']]);

			//For DataTables
			Route::get('line/get', 'LineController@get')->name('cmovil.access.line.get');

			/**
			 * Line Status'
			 */


			Route::get('line/deleted', 'LineController@deleted')->name('cmovil.access.line.deleted');

			/**
             * Deleted Line
             */
            Route::group(['prefix' => 'line/{line}'], function() {
				Route::get('delete', 'LineController@delete')->name('cmovil.access.line.delete-permanently');
                Route::get('restore', 'LineController@restore')->name('cmovil.access.line.restore');
            });
		});
	});

});