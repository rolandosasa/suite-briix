<?php

namespace App\Models\Cmovil\Access\Enterprise\Traits;

/**
 * Class EnterpriseAccess
 * @package App\Models\Cmovil\Access\Enterprise\Traits
 */
trait EnterpriseAccess
{
    /**
     * Save the inputted permissions.
     *
     * @param  mixed  $inputPermissions
     * @return void
     */
    public function savePermissions($inputPermissions)
    {
        if (! empty($inputPermissions)) {
            $this->permissions()->sync($inputPermissions);
        } else {
            $this->permissions()->detach();
        }
    }

    /**
     * Attach permission to current enterprise.
     *
     * @param  object|array $permission
     * @return void
     */
    public function attachPermission($permission)
    {
        if (is_object($permission)) {
            $permission = $permission->getKey();
        }

        if (is_array($permission)) {
            $permission = $permission['id'];
        }

        $this->permissions()->attach($permission);
    }

    /**
     * Detach permission form current enterprise.
     *
     * @param  object|array $permission
     * @return void
     */
    public function detachPermission($permission)
    {
        if (is_object($permission)) {
            $permission = $permission->getKey();
        }

        if (is_array($permission)) {
            $permission = $permission['id'];
        }

        $this->permissions()->detach($permission);
    }

    /**
     * Attach multiple permissions to current enterprise.
     *
     * @param  mixed  $permissions
     * @return void
     */
    public function attachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->attachPermission($permission);
        }
    }

    /**
     * Detach multiple permissions from current enterprise
     *
     * @param  mixed  $permissions
     * @return void
     */
    public function detachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }
}