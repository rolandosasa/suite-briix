<?php

namespace App\Models\Cmovil\Access\Permissionservice\Traits\Relationship;

/**
 * Class PermissionRelationship
 * @package App\Models\Cmovil\Access\Permissionservice\Traits\Relationship
 */
trait PermissionserviceRelationship
{
    /**
     * @return mixed
     */
    public function plans()
    {
        return $this->belongsToMany(config('accessCM.plan'), config('accessCM.permission_plan_table'), 'permission_id', 'plan_id');
    }
}