<?php

namespace App\Repositories\Cmovil\Access\Permissionservice;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Permissionservice
 */
interface PermissionserviceRepositoryContract
{

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc');
}