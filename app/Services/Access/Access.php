<?php

namespace App\Services\Access;

/**
 * Class Access
 * @package App\Services\Access
 */
class Access
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get the currently authenticated user or null.
     */
    public function user()
    {
        return auth()->user();
    }

    /**
     * Return if the current session user is a guest or not
     * @return mixed
     */
    public function guest()
    {
        return auth()->guest();
    }

	/**
     * @return mixed
     */
    public function logout()
    {
        return auth()->logout();
    }

    /**
     * Get the currently authenticated user's id
     * @return mixed
     */
    public function id()
    {
        return auth()->id();
    }

	/**
     * @param $id
     * @return mixed
     */
    public function loginUsingId($id) {
        return auth()->loginUsingId($id);
    }

    /**
     * Checks if the current user has a Role by its name or id
     *
     * @param  string $role Role name.
     * @return bool
     */
    public function hasRole($role)
    {
        if ($user = $this->user()) {
            return $user->hasRole($role);
        }

        return false;
    }

    /**
     * Checks if the current user has a Plan by its name or id
     *
     * @param  string $plan Plan name.
     * @return bool
     */
    public function hasPlan($plan)
    {
        if ($user = $this->user()) {
            return $user->hasPlan($plan);
        }

        return false;
    }

    /**
     * Checks if the user has either one or more, or all of an array of roles
     * @param  $roles
     * @param  bool     $needsAll
     * @return bool
     */
    public function hasRoles($roles, $needsAll = false)
    {
        if ($user = $this->user()) {
            //If not an array, make a one item array
            if (!is_array($roles)) {
                $roles = array($roles);
            }

            return $user->hasRoles($roles, $needsAll);
        }

        return false;
    }

    /**
     * Checks if the user has either one or more, or all of an array of plans
     * @param  $plans
     * @param  bool     $needsAll
     * @return bool
     */
    public function hasPlans($plans, $needsAll = false)
    {
        if ($user = $this->user()) {
            //If not an array, make a one item array
            if (!is_array($plans)) {
                $plans = array($plans);
            }

            return $user->hasPlans($plans, $needsAll);
        }

        return false;
    }

    /**
     * Check if the current user has a permission by its name or id
     *
     * @param  string $permission Permission name or id.
     * @return bool
     */
    public function allow($permission)
    {
        if ($user = $this->user()) {
            return $user->allow($permission);
        }

        return false;
    }

    public function allowproductpermission($permission)
    {
        if ($user = $this->user()) {
            return $user->allowproductpermission($permission);
        }

        return false;
    }
    public function allowcmpermission($permission)
    {
        if ($user = $this->user()) {
            return $user->allowproductpermission($permission);
        }

        return false;
    }

    /**
     * Check if the current user has a permission by its name or id
     *
     * @param  string $permissionservice Permissionservice name or id.
     * @return bool
     */
    public function allowproduct($product)
    {
        //dd($product);
       /// $enterprise=$this->user()->enterprise;
        //dd($enterprise);
        //$contracts=Contract::where('enterprise_id', $enterprise->id);
        //dd($contracts);
        if ($user = $this->user()) {
            return $user->allowproduct($product);
        }

        return false;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultiple($permissions, $needsAll = false)
    {
        if ($user = $this->user()) {
            //If not an array, make a one item array
            if (!is_array($permissions)) {
                $permissions = array($permissions);
            }

            return $user->allowMultiple($permissions, $needsAll);
        }

        return false;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultipleservice($permissions, $needsAll = false)
    {
        if ($user = $this->user()) {
            //If not an array, make a one item array
            if (!is_array($permissions)) {
                $permissions = array($permissions);
            }

            return $user->allowMultipleservice($permissions, $needsAll);
        }

        return false;
    }

    /**
     * @param  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->allow($permission);
    }

    /**
     * @param  $permission
     * @return bool
     */
    public function hasPermissionservice($permissionservice)
    {
        return $this->allowservice($permissionservice);
    }

    /**
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function hasPermissions($permissions, $needsAll = false)
    {
        return $this->allowMultiple($permissions, $needsAll);
    }

    /**
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function hasPermissionservices($permissions, $needsAll = false)
    {
        return $this->allowMultipleservice($permissions, $needsAll);
    }
}