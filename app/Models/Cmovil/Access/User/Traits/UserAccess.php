<?php

namespace App\Models\Cmovil\Access\User\Traits;

/**
 * Class UserAccess
 * @package App\Models\Cmovil\Access\User\Traits
 */
trait UserAccess
{
    /**
     * Checks if the user has a Role by its name or id.
     *
     * @param  string $nameOrId Role name or id.
     * @return bool
     */
    public function hasRole($nameOrId)
    {
        foreach ($this->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($role->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($role->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the user has a Plan by its name or id.
     *
     * @param  string $nameOrId Plan name or id.
     * @return bool
     */
    public function hasPlan($nameOrId)
    {
        foreach ($this->plans as $plan) {
            //See if role has all permissions
            if ($plan->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($plan->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($plan->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of roles
     *
     * All must return true
     * @param  $roles
     * @param  $needsAll
     * @return bool
     */
    public function hasRoles($roles, $needsAll)
    {
        //User has to possess all of the roles specified
        if ($needsAll) {
            $hasRoles = 0;
            $numRoles = count($roles);

            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    $hasRoles++;
                }
            }

            return $numRoles == $hasRoles;
        }

        //User has to possess one of the roles specified
        $hasRoles = 0;
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                $hasRoles++;
            }

        }

        return $hasRoles > 0;
    }

    /**
     * Checks to see if user has array of plans
     *
     * All must return true
     * @param  $plans
     * @param  $needsAll
     * @return bool
     */
    public function hasPlans($plans, $needsAll)
    {
        //User has to possess all of the plans specified
        if ($needsAll) {
            $hasPlans = 0;
            $numPlans = count($plans);

            foreach ($plans as $plan) {
                if ($this->hasPlan($plan)) {
                    $hasPlans++;
                }
            }

            return $numPlans == $hasPlans;
        }

        //User has to possess one of the plans specified
        $hasPlans = 0;
        foreach ($plans as $plan) {
            if ($this->hasPlan($plan)) {
                $hasPlans++;
            }

        }

        return $hasPlans > 0;
    }


    /**
     * Check if user has a permission by its name or id.
     *
     * @param  string $nameOrId Permission name or id.
     * @return bool
     */
    public function allow($nameOrId)
    {
        foreach ($this->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($role->permissions as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check if user has a permissionsefvices by its name or id.
     *
     * @param  string $nameOrId Permissionservice name or id.
     * @return bool
     */
    public function allowservice($nameOrId)
    {
        foreach ($this->plans as $plan) {
            //See if plan has all permissions
            if ($plan->all) {
                return true;
            }

            // Validate against the Permissionservice table
            foreach ($plan->permissions as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue
     *
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultiple($permissions, $needsAll = false)
    {
        //User has to possess all of the permissions specified
        if ($needsAll) {
            $hasPermissions = 0;
            $numPermissions = count($permissions);

            foreach ($permissions as $perm) {
                if ($this->allow($perm)) {
                    $hasPermissions++;
                }
            }

            return $numPermissions == $hasPermissions;
        }

        //User has to possess one of the permissions specified
        $hasPermissions = 0;
        foreach ($permissions as $perm) {
            if ($this->allow($perm)) {
                $hasPermissions++;
            }
        }

        return $hasPermissions > 0;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue
     *
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultipleservice($permissions, $needsAll = false)
    {
        //User has to possess all of the permissions specified
        if ($needsAll) {
            $hasPermissions = 0;
            $numPermissions = count($permissions);

            foreach ($permissions as $perm) {
                if ($this->allowservice($perm)) {
                    $hasPermissions++;
                }
            }

            return $numPermissions == $hasPermissions;
        }

        //User has to possess one of the permissions specified
        $hasPermissions = 0;
        foreach ($permissions as $perm) {
            if ($this->allowservice($perm)) {
                $hasPermissions++;
            }
        }

        return $hasPermissions > 0;
    }

    /**
     * @param  $nameOrId
     * @return bool
     */
    public function hasPermission($nameOrId)
    {
        return $this->allow($nameOrId);
    }

    /**
     * @param  $nameOrId
     * @return bool
     */
    public function hasPermissionservice($nameOrId)
    {
        return $this->allowservice($nameOrId);
    }

    /**
     * @param  $permissions
     * @param  bool           $needsAll
     * @return bool
     */
    public function hasPermissions($permissions, $needsAll = false)
    {
        return $this->allowMultiple($permissions, $needsAll);
    }

    /**
     * @param  $permissions
     * @param  bool           $needsAll
     * @return bool
     */
    public function hasPermissionservices($permissionservices, $needsAll = false)
    {
        return $this->allowMultipleservices($permissionservices, $needsAll);
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param  mixed  $role
     * @return void
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param  mixed  $plan
     * @return void
     */
    public function attachPlan($plan)
    {
        if (is_object($plan)) {
            $plan = $plan->getKey();
        }

        if (is_array($plan)) {
            $plan = $plan['id'];
        }

        $this->plans()->attach($plan);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param  mixed  $role
     * @return void
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param  mixed  $plan
     * @return void
     */
    public function detachPlan($plan)
    {
        if (is_object($plan)) {
            $plan = $plan->getKey();
        }

        if (is_array($plan)) {
            $plan = $plan['id'];
        }

        $this->plans()->detach($plan);
    }

    /**
     * Attach multiple roles to a user
     *
     * @param  mixed  $roles
     * @return void
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Attach multiple plans to a user
     *
     * @param  mixed  $plans
     * @return void
     */
    public function attachPlans($plans)
    {
        foreach ($plans as $plan) {
            $this->attachPlan($plan);
        }
    }

    /**
     * Detach multiple roles from a user
     *
     * @param  mixed  $roles
     * @return void
     */
    public function detachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

    /**
     * Detach multiple plans from a user
     *
     * @param  mixed  $plans
     * @return void
     */
    public function detachPlans($plans)
    {
        foreach ($plans as $plan) {
            $this->detachPlan($plan);
        }
    }
}
