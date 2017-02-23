<?php

Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require (__DIR__ . '/Routes/Language/Language.php');
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require (__DIR__ . '/Routes/Frontend/Frontend.php');
        require (__DIR__ . '/Routes/Frontend/Access.php');
    });
});
/**
 * Sub - Dominio cpanel.briix.app
 * Backend Routes controla Cpanel
 * Namespaces indicate folder structure
 * Briix middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['domain' => config('domain.name'),'namespace' => 'Cpanel', 'prefix' => 'cpanel', 'middleware' => 'cpanel'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Cpanel/Cpanel/Dashboard.php');
});


/**
 * Sub - Dominio crecursos.briix.app
 * Backend Routes controla Crecursos
 * Namespaces indicate folder structure
 * Briix middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['domain' => config('domain.name'),'namespace' => 'Crecursos', 'prefix' => 'crecursos', 'middleware' => 'crecursos'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Crecursos/Crecursos/Dashboard.php');
    require (__DIR__ . '/Routes/Crecursos/Crecursos/Access.php');
});

/**
 * Dominio briix.app
 * Backend Routes controla Cmovil
 * Namespaces indicate folder structure
 * Cmovil middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['domain' => config('domain.name'),'namespace' => 'Cmovil', 'prefix' => 'cmovil', 'middleware' => 'cmovil'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Cmovil/Cmovil/Dashboard.php');
    require (__DIR__ . '/Routes/Cmovil/Cmovil/Access.php');
});

/**
 * Dominio briix.app
 * Backend Routes controla Briix
 * Namespaces indicate folder structure
 * Briix middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['domain' => config('domain.name'),'namespace' => 'Briix', 'prefix' => 'briix', 'middleware' => 'briix'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Briix/Briix/Dashboard.php');
    require (__DIR__ . '/Routes/Briix/Briix/Access.php');
    require (__DIR__ . '/Routes/Briix/Briix/LogViewer.php');
});

