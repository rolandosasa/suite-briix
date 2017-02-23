<?php

namespace App\Repositories\Cmovil\Access\Permissionservice;

use App\Models\Cmovil\Access\Permissionservice\Permissionservice;

/**
 * Class EloquentPermissionserviceRepository
 * @package App\Repositories\Permissionservice
 */
class EloquentPermissionserviceRepository implements PermissionserviceRepositoryContract
{

	/**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc')
    {
        return Permissionservice::orderBy($order_by, $sort)->get();
    }
}