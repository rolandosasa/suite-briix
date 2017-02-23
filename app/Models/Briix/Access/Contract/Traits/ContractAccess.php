<?php

namespace App\Models\Briix\Access\Contract\Traits;

/**
 * Class ContractAccess
 * @package App\Models\Briix\Access\Contract\Traits
 */
trait ContractAccess
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

   public function attachPacket($packet)
    {
        if (is_object($packet)) {
            $packet = $packet->getKey();
        }

        if (is_array($packet)) {
            $packet = $packet['id'];
        }

        $this->packets()->attach($packet);
    }

    public function detachPacket($packet)
    {
        if (is_object($packet)) {
            $packet = $packet->getKey();
        }

        if (is_array($packet)) {
            $packet = $packet['id'];
        }

        $this->packets()->detach($packet);
    }

    public function attachPackets($packets)
    {
        foreach ($packets as $packet) {
            $this->attachPacket($packet);
        }
    }
    public function detachPackets($packets)
    {
        foreach ($packets as $packet) {
            $this->detachPacket($packet);
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