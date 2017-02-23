<?php

namespace App\Repositories\Briix\Access\Product;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Product
 */
interface ProductRepositoryContract
{

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllProducts($order_by = 'sort', $sort = 'asc');
}