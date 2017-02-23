<?php

Route::group([
	'middleware' => 'access.routeNeedsPermission:view-backend',
    'prefix'     => 'access',
    'namespace'  => 'Access',
], function() {

	/**
	 * User Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-users',
	], function() {
		Route::group(['namespace' => 'User'], function() {
			Route::resource('user', 'UserController', ['except' => ['show']]);

			/**
			 * For DataTables
			 */
			Route::get('user/get', 'UserController@get')->name('briix.access.user.get');

			Route::post('user/client', ['as'=>'select-client','uses'=>'UserController@selectClient']);

			/**
			 * User Status'
			 */
			Route::get('user/deactivated', 'UserController@deactivated')->name('briix.access.user.deactivated');
			Route::get('user/deleted', 'UserController@deleted')->name('briix.access.user.deleted');

			/**
			 * Misc
			 */
			Route::get('account/confirm/resend/{user}', 'UserController@resendConfirmationEmail')->name('briix.account.confirm.resend');

			/**
			 * Specific User
			 */
			Route::group(['prefix' => 'user/{user}'], function() {
				Route::get('mark/{status}', 'UserController@mark')->name('briix.access.user.mark')->where(['status' => '[0,1]']);
				Route::get('password/change', 'UserController@changePassword')->name('briix.access.user.change-password');
				Route::post('password/change', 'UserController@updatePassword')->name('briix.access.user.change-password');
				Route::get('login-as', 'UserController@loginAs')->name('briix.access.user.login-as');
			});

            /**
             * Deleted User
             */
            Route::group(['prefix' => 'user/{deletedUser}'], function() {
				Route::get('delete', 'UserController@delete')->name('briix.access.user.delete-permanently');
                Route::get('restore', 'UserController@restore')->name('briix.access.user.restore');
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
			Route::get('role/get', 'RoleController@get')->name('briix.access.role.get');
		});
	});

	/**
	 * Plan Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-plans',
	], function() {
		Route::group(['namespace' => 'Packet'], function () {
			Route::resource('packet', 'PacketController', ['except' => ['show']]);

			//For DataTables
			Route::get('packet/get', 'PacketController@get')->name('briix.access.packet.get');
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
			Route::get('enterprise/get', 'EnterpriseController@get')->name('briix.access.enterprise.get');

			/**
			 * Enterprise Status'
			 */
			Route::get('enterprise/deleted', 'EnterpriseController@deleted')->name('briix.access.enterprise.deleted');

			/**
             * Deleted Enterprise
             */
            Route::group(['prefix' => 'enterprise/{deletedEnterprise}'], function() {
				Route::get('delete', 'EnterpriseController@delete')->name('briix.access.enterprise.delete-permanently');
                Route::get('restore', 'EnterpriseController@restore')->name('briix.access.enterprise.restore');
            });
		});
	});

	/**
	 * Contract Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-contracts',
	], function() {
		Route::group(['namespace' => 'Contract'], function () {
			Route::resource('contract', 'ContractController', ['except' => ['show']]);

			//For DataTables
			Route::get('contract/get', 'ContractController@get')->name('briix.access.contract.get');
			
			// For DataTables .
			Route::get('contract/union', 'ContractController@union')->name('briix.access.contract.union');

			/**
			 * Contract Status'
			 */
			Route::get('contract/deleted', 'ContractController@deleted')->name('briix.access.contract.deleted');

			/**
             * Deleted Contract
             */
            Route::group(['prefix' => 'contract/{deletedContract}'], function() {
				Route::get('delete', 'ContractController@delete')->name('briix.access.contract.delete-permanently');
                Route::get('restore', 'ContractController@restore')->name('briix.access.contract.restore');        
            });
		});
	});
	
	/**
	 * ratePlans Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-rateplans',
	], function() {
		Route::group(['namespace' => 'RatePlan'], function () {
			Route::resource('ratePlan', 'RatePlanController', ['except' => ['show']]);

			//For DataTables
			Route::get('ratePlan/get', 'RatePlanController@get')->name('briix.access.ratePlan.get');
			
			/**
			 * RatePlan Status'
			 */
			Route::get('ratePlan/deleted', 'RatePlanController@deleted')->name('briix.access.ratePlan.deleted');

			/**
             * Deleted RatePlan
             */
            Route::group(['prefix' => 'ratePlan/{deletedRatePlan}'], function() {
				Route::get('delete', 'RatePlanController@delete')->name('briix.access.ratePlan.delete-permanently');
                Route::get('restore', 'RatePlanController@restore')->name('briix.access.ratePlan.restore');        
            });
		});
	});

	/**
	 * discountPlans Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-discountplans',
	], function() {
		Route::group(['namespace' => 'DiscountPlan'], function () {
			Route::resource('discountPlan', 'DiscountPlanController', ['except' => ['show']]);

			//For DataTables
			Route::get('discountPlan/get', 'DiscountPlanController@get')->name('briix.access.discountPlan.get');
			
			/**
			 * DiscountPlan Status'
			 */
			Route::get('discountPlan/deleted', 'DiscountPlanController@deleted')->name('briix.access.discountPlan.deleted');

			/**
             * Deleted DiscountPlan
             */
            Route::group(['prefix' => 'discountPlan/{deletedDiscountPlan}'], function() {
				Route::get('delete', 'DiscountPlanController@delete')->name('briix.access.discountPlan.delete-permanently');
                Route::get('restore', 'DiscountPlanController@restore')->name('briix.access.discountPlan.restore');        
            });
		});
	});
});