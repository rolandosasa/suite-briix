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
			Route::get('user/get', 'UserController@get')->name('crecursos.access.user.get');

			/**
			 * User Status'
			 */
			Route::get('user/deactivated', 'UserController@deactivated')->name('crecursos.access.user.deactivated');
			Route::get('user/deleted', 'UserController@deleted')->name('crecursos.access.user.deleted');

			/**
			 * Misc
			 */
			Route::get('account/confirm/resend/{user}', 'UserController@resendConfirmationEmail')->name('crecursos.account.confirm.resend');

			/**
			 * Specific User
			 */
			Route::group(['prefix' => 'user/{user}'], function() {
				Route::get('mark/{status}', 'UserController@mark')->name('crecursos.access.user.mark')->where(['status' => '[0,1]']);
				Route::get('password/change', 'UserController@changePassword')->name('crecursos.access.user.change-password');
				Route::post('password/change', 'UserController@updatePassword')->name('crecursos.access.user.change-password');
				Route::get('login-as', 'UserController@loginAs')->name('crecursos.access.user.login-as');
			});

       /**
        * Deleted User
        */
        Route::group(['prefix' => 'user/{deletedUser}'], function() {
					Route::get('delete', 'UserController@delete')->name('crecursos.access.user.delete-permanently');
          Route::get('restore', 'UserController@restore')->name('crecursos.access.user.restore');
        });
		});
	});

	/**
	 * Role Management
	 */
	Route::group(['middleware' => 'access.routeNeedsPermission:manage-roles',], function() {
		Route::group(['namespace' => 'Role'], function () {
			Route::resource('role', 'RoleController', ['except' => ['show']]);

			//For DataTables
			Route::get('role/get', 'RoleController@get')->name('crecursos.access.role.get');
		});
	});


	/* Reclutamiento*/
	Route::group(['namespace' => 'HumanResources'], function () {
			Route::resource('humanresources', 'HumanResourcesController', ['except' => ['show']]);

		//For DataTables
		Route::get('humanresources/get', 'HumanResourcesController@get')->name('crecursos.access.humanresources.get');
		// importacion de Municipios
		Route::get('humanresources/import','HumanResourcesController@import');	
	});


	// Rutas para empresa
	Route::group(['namespace' => 'Enterprise'], function (){
		Route::resource('enterprise', 'EnterpriseController', ['except' => ['show']]);

		//For DataTables
		Route::get('enterprise/get', 'EnterpriseController@get')->name('crecursos.access.enterprise.get');

		Route::group(['prefix' => 'enterprise/{enterprise}'], function() {
				Route::get('delete', 'EnterpriseController@delete')->name('crecursos.access.enterprise.delete-permanently');
	    });
	});

	// Rutas para el apartado Departamento
	Route::group(['namespace' => 'Department'], function (){
		Route::resource('department', 'DepartmentController', ['except' => ['show']]);

		Route::get('department/get', 'DepartmentController@get')->name('crecursos.access.department.get');

	});

	// Rutas de personal
	Route::group(['namespace' => 'Personal'], function () {
		Route::resource('personal', 'PersonalController', ['except' => ['show']]);

		//For DataTables
		Route::get('personal/get', 'PersonalController@get')->name('crecursos.access.personal.get');

		Route::get('personal/deleted', 'PersonalController@deleted')->name('crecursos.access.personal.deleted');
	});
		
	// Rutas para Candidatos
	Route::group(['namespace' => 'Candidate'], function (){
		Route::resource('candidate', 'CandidateController', ['except' => ['show']]);

		Route::get('candidate/get', 'CandidateController@get')->name('crecursos.access.candidate.get');

		Route::get('candidate/validation', 'CandidateController@validation')->name('crecursos.access.candidate.validation');
	});

	// Rutas para el apartado de competencias y Habilidades
	Route::group(['namespace' => 'Compettition'], function (){
		Route::resource('compettition', 'CompettitionController', ['except' => ['show']]);

		Route::get('compettition/get', 'CompettitionController@get')->name('crecursos.access.compettition.get');
	});

	// Rutas del calendario
	Route::group(['namespace' => 'Calendar'], function (){
		Route::resource('calendar', 'CalendarController', ['except' => ['show']]);
		Route::get('calendar/get', 'CalendarController@get')->name('crecursos.access.calendar.get');
	});

	// Rutas para Puestos
	Route::group(['namespace' => 'Job'], function (){
		Route::resource('job', 'JobController', ['except' => ['show']]);
		Route::get('job/get', 'JobController@get')->name('crecursos.access.job.get');
	});

	// Rutas Proyectos
	Route::group(['namespace' => 'Project'], function (){
		Route::resource('project', 'ProjectController', ['except' => ['show']]);
		
		//For DataTables
		Route::get('project/get', 'ProjectController@get')->name('crecursos.access.project.get');
	    Route::group(['prefix' => 'project/{project}'], function() {
				Route::get('delete', 'ProjectController@delete')->name('crecursos.access.project.delete-permanently');
	    });
	});

	// Rutas Proyectos
	Route::group(['namespace' => 'Concept'], function (){
		Route::resource('concept', 'ConceptController', ['except' => ['show']]);
	  Route::group(['prefix' => 'concept/{project}'], function() {
			Route::get('plan', 'ConceptController@conceptsplan')->name('crecursos.access.concept.concepts_plan');
	  });
	});

	//Rutas Estimado
	Route::group(['namespace' => 'Estimated'], function (){
		Route::resource('estimated', 'EstimatedController', ['except' => ['show']]);
		Route::get('estimated/executed', 'EstimatedController@executed')->name('crecursos.access.estimated.executed');
	});

	//Rutas Avances de Projectos
	Route::group(['namespace' => 'ProjectAdvance'], function (){
		Route::resource('projectadvanced', 'ProjectAdvanceController', ['except' => ['show']]);
		
	});

});

