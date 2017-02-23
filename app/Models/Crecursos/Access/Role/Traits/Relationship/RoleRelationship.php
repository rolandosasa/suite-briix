<?php

namespace App\Models\Crecursos\Access\Role\Traits\Relationship;

/**
 * Class RoleRelationship
 * @package App\Models\Crecursos\Access\Role\Traits\Relationship
 */
trait RoleRelationship
{
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(config('authRH.providers.users.model'), config('accessRH.assigned_roles_table'), 'role_id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(config('accessRH.permission'), config('accessRH.permission_role_table'), 'role_id', 'permission_id')
            ->orderBy('display_name', 'asc');
    }
}