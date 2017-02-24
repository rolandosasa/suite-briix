<?php

namespace App\Providers;

use App\Services\Access\Access;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class AccessServiceProvider
 * @package App\Providers
 */
class AccessServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Package boot method
     */
    public function boot()
    {
        $this->registerBladeExtensions();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAccess();
        $this->registerFacade();
        $this->registerBindings();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerAccess()
    {
        $this->app->bind('access', function ($app) {
            return new Access($app);
        });
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade()
    {
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Access', \App\Services\Access\Facades\Access::class);
        });
    }

    /**
     * Register service provider bindings
     */
    public function registerBindings()
    {
        /**
         * Usuarios Frontend Briix
        */
        $this->app->bind(
            \App\Repositories\Frontend\Access\User\UserRepositoryContract::class,
            \App\Repositories\Frontend\Access\User\EloquentUserRepository::class
        );

        /**
         * Briix
        */
        $this->app->bind(
            \App\Repositories\Briix\Access\User\UserRepositoryContract::class,
            \App\Repositories\Briix\Access\User\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Briix\Access\Role\RoleRepositoryContract::class,
            \App\Repositories\Briix\Access\Role\EloquentRoleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Briix\Access\Packet\PacketRepositoryContract::class,
            \App\Repositories\Briix\Access\Packet\EloquentPacketRepository::class
        );

        $this->app->bind(
            \App\Repositories\Briix\Access\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Briix\Access\Permission\EloquentPermissionRepository::class
        );

        $this->app->bind(

            \App\Repositories\Briix\Access\Product\ProductRepositoryContract::class,
            \App\Repositories\Briix\Access\Product\EloquentProductRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\Briix\Access\Enterprise\EnterpriseRepositoryContract::class,
            \App\Repositories\Briix\Access\Enterprise\EloquentEnterpriseRepository::class
        );

        $this->app->bind(
            \App\Repositories\Briix\Access\Contract\ContractRepositoryContract::class,
            \App\Repositories\Briix\Access\Contract\EloquentContractRepository::class
        );

        $this->app->bind(
            \App\Repositories\Briix\Access\RatePlan\RatePlanRepositoryContract::class,
            \App\Repositories\Briix\Access\RatePlan\EloquentRatePlanRepository::class

        );

        $this->app->bind(
            \App\Repositories\Briix\Access\DiscountPlan\DiscountPlanRepositoryContract::class,
            \App\Repositories\Briix\Access\DiscountPlan\EloquentDiscountPlanRepository::class

        );

        /**
         * Recursos Humanos
        */
        $this->app->bind(
            \App\Repositories\Crecursos\Access\User\UserRepositoryContract::class,
            \App\Repositories\Crecursos\Access\User\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Role\RoleRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Role\EloquentRoleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Permission\EloquentPermissionRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Enterprise\EnterpriseRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Enterprise\EloquentEnterpriseRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Department\DepartmentRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Department\EloquentDepartmentRepository::class
        );

        $this->app->bind(

            \App\Repositories\Crecursos\Access\HumanResources\HumanResourcesRepositoryContract::class,
            \App\Repositories\Crecursos\Access\HumanResources\EloquentHumanResourcesRepository::class
        );

         $this->app->bind(
            \App\Repositories\Crecursos\Access\Requirements\RequirementsRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Requirements\EloquentRequirementsRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Candidate\CandidateRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Candidate\EloquentCandidateRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Compettition\CompettitionRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Compettition\EloquentCompettitionRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Personal\PersonalRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Personal\EloquentPersonalRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Project\ProjectRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Project\EloquentProjectRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Estimated\EstimatedRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Estimated\EloquentEstimatedRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Month\MonthRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Month\EloquentMonthRepository::class
        );

        $this->app->bind(
            \App\Repositories\Crecursos\Access\Job\JobRepositoryContract::class,
            \App\Repositories\Crecursos\Access\Job\EloquentJobRepository::class
        );

        /**
         * Cmovil
        */
        $this->app->bind(
            \App\Repositories\Cmovil\Access\Enterprise\EnterpriseRepositoryContract::class,
            \App\Repositories\Cmovil\Access\Enterprise\EloquentEnterpriseRepository::class
        );

        $this->app->bind(
            \App\Repositories\Cmovil\Access\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Cmovil\Access\Permission\EloquentPermissionRepository::class
        );

        $this->app->bind(

            \App\Repositories\Cmovil\Access\Permissionservice\PermissionserviceRepositoryContract::class,
            \App\Repositories\Cmovil\Access\Permissionservice\EloquentPermissionserviceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Cmovil\Access\Role\RoleRepositoryContract::class,
            \App\Repositories\Cmovil\Access\Role\EloquentRoleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Cmovil\Access\User\UserRepositoryContract::class,
            \App\Repositories\Cmovil\Access\User\EloquentUserRepository::class
        );


        $this->app->bind(
            \App\Repositories\Cmovil\Access\Line\LineRepositoryContract::class,
            \App\Repositories\Cmovil\Access\Line\EloquentLineRepository::class
        );

    }

    /**
     * Register the blade extender to use new blade sections
     */
    protected function registerBladeExtensions()
    {
        /**
         * Role based blade extensions
         * Accepts either string of Role Name or Role ID
         */
        Blade::directive('role', function ($role) {
            return "<?php if (access()->hasRole{$role}): ?>";
        });

        /**
         * Plan based blade extensions
         * Accepts either string of Plan Name or Plan ID
         */
        Blade::directive('plan', function ($plan) {
            return "<?php if (access()->hasPlan{$plan}): ?>";
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('roles', function ($roles) {
            return "<?php if (access()->hasRoles{$roles}): ?>";
        });

        Blade::directive('needsroles', function ($roles) {
            return '<?php if (access()->hasRoles(' . $roles . ', true)): ?>';
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('plans', function ($plans) {
            return "<?php if (access()->hasPlans{$plans}): ?>";
        });

        Blade::directive('needsplans', function ($plans) {
            return '<?php if (access()->hasPlans(' . $plans . ', true)): ?>';
        });

        /**
         * Permission based blade extensions
         * Accepts wither string of Permission Name or Permission ID
         */
        Blade::directive('permission', function ($permission) {
            return "<?php if (access()->allow{$permission}): ?>";
        });

          /**
         * Permission based blade extensions
         * Accepts wither string of Permission Name or Permission ID
         */
        Blade::directive('productpermission', function ($permission) {
            return "<?php if (access()->allowproductpermission{$permission}): ?>";
        });

         Blade::directive('cmpermission', function ($permission) {
            return "<?php if (access()->allowcmpermission{$permission}): ?>";
        });


        /**
         * Permissionservice based blade extensions
         * Accepts wither string of Permissionservice Name or Permissionservice ID
         */
        Blade::directive('packet', function ($packet) {
            return "<?php if (access()->allowproduct{$packet}): ?>";
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('permissions', function ($permissions) {
            return "<?php if (access()->allowMultiple{$permissions}): ?>";
        });

        Blade::directive('needspermissions', function ($permissions) {
            return '<?php if (access()->allowMultiple(' . $permissions . ', true)): ?>';
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('permissionservices', function ($permissionservices) {
            return "<?php if (access()->allowMultipleservice{$permissionservices}): ?>";
        });

        Blade::directive('needspermissionservices', function ($permissionservices) {
            return '<?php if (access()->allowMultipleservice(' . $permissionservices . ', true)): ?>';
        });

        /**
         * Generic if closer to not interfere with built in blade
         */
        Blade::directive('endauth', function () {
            return '<?php endif; ?>';
        });
    }
}