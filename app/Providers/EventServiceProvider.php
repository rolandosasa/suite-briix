<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

	/**
     * Class event subscribers
     * @var array
     */
    protected $subscribe = [
		/**
		 * Frontend Subscribers
		 */

		/**
		 * Auth Subscribers
		 */
		\App\Listeners\Frontend\Auth\UserEventListener::class,

		/**
		 * Backend Subscribers
		 */

		/*
         * Eventos Briix
        */
        \App\Listeners\Briix\Access\User\UserEventListener::class,
		\App\Listeners\Briix\Access\Role\RoleEventListener::class,
        \App\Listeners\Briix\Access\Contract\ContractEventListener::class,
        \App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener::class,
        \App\Listeners\Briix\Access\Plan\PlanEventListener::class,
        \App\Listeners\Briix\Access\RatePlan\RatePlanEventListener::class,

        /*
         * Events Crecursos
        */
        \App\Listeners\Crecursos\Access\User\UserEventListener::class,
        \App\Listeners\Crecursos\Access\Role\RoleEventListener::class,
        \App\Listeners\Crecursos\Access\Personal\PersonalEventListener::class,
        \App\Listeners\Crecursos\Access\Department\DepartmentEventListener::class,
        \App\Listeners\Crecursos\Access\Enterprise\EnterpriseEventListener::class,
        \App\Listeners\Crecursos\Access\Project\ProjectEventListener::class, 
        \App\Listeners\Crecursos\Access\Estimated\EstimatedEventListener::class,   
        \App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener::class,
        \App\Listeners\Crecursos\Access\Candidate\CandidateEventListener::class,
        \App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener::class,
        \App\Listeners\Crecursos\Access\Job\JobEventListener::class,

        /*
         * Eventos Cmovil
        */
        \App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener::class,
        \App\Listeners\Cmovil\Access\User\UserEventListener::class,
        \App\Listeners\Cmovil\Access\Role\RoleEventListener::class,
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
