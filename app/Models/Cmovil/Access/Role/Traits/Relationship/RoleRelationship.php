<?php

namespace App\Models\Cmovil\Access\Role\Traits\Relationship;

/**
 * Class RoleRelationship
 * @package App\Models\Cmovil\Access\Role\Traits\Relationship
 */
trait RoleRelationship
{
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.cmusers.model'), config('accessCM.assigned_roles_table'), 'role_id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(config('accessCM.permission'), config('accessCM.permission_role_table'), 'role_id', 'permission_id')
            ->orderBy('display_name', 'asc');
    }
}