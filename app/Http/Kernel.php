<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel
 * @package App\Http
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\LocaleMiddleware::class,
        ],

        'cpanel' => [
            'web',
            'auth',
            'access.routeNeedsPermission:view-backend',
            'timeout',
        ],

        'crecursos' => [
            'web',
            'auth',
            'access.routeNeedsPermission:view-backend',
            'timeout',
        ],
        
        'cmovil' => [
            'web',
            'auth',
            'access.routeNeedsProduct:cmovil',
            'timeout',
        ],

        'briix' => [
            'web',
            'auth',
            'access.routeNeedsProduct:briix',
            'timeout',
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'timeout' => \App\Http\Middleware\SessionTimeout::class,

        /**
         * Access Middleware
         */
        'access.routeNeedsRole' => \App\Http\Middleware\RouteNeedsRole::class,
        'access.routeNeedsPacket' => \App\Http\Middleware\routeNeedsPacket::class,
        'access.routeNeedsPermission' => \App\Http\Middleware\RouteNeedsPermission::class,
        'access.routeNeedsProduct' => \App\Http\Middleware\RouteNeedsProduct::class,
        'access.routeNeedsProductPermission' => \App\Http\Middleware\RouteNeedsProductPermission::class,
    ];
}
