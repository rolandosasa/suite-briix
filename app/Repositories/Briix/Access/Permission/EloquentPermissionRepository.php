<?php

namespace App\Repositories\Briix\Access\Permission;

use App\Models\Briix\Access\Permission\Permission;

/**
 * Class EloquentPermissionRepository
 * @package App\Repositories\Permission
 */
class EloquentPermissionRepository implements PermissionRepositoryContract
{

	/**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc')
    {
        return Permission::orderBy($order_by, $sort)->get();
    }
}