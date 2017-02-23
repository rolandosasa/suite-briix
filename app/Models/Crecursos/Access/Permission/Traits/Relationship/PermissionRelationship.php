<?php

namespace App\Models\Crecursos\Access\Permission\Traits\Relationship;

/**
 * Class PermissionRelationship
 * @package App\Models\Crecursos\Access\Permission\Traits\Relationship
 */
trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('accessRH.role'), config('accessRH.permission_role_table'), 'permission_id', 'role_id');
    }
}