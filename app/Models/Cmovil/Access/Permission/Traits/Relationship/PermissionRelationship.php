<?php

namespace App\Models\Cmovil\Access\Permission\Traits\Relationship;

/**
 * Class PermissionRelationship
 * @package App\Models\Cmovil\Access\Permission\Traits\Relationship
 */
trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('accessCM.role'), config('accessCM.permission_role_table'), 'permission_id', 'role_id');
    }
}