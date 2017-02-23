<?php

namespace App\Repositories\Briix\Access\Product;

use App\Models\Briix\Access\Product\Product;

/**
 * Class EloquentProductsserviceRepository
 * @package App\Repositories\Productsservice
 */
class EloquentProductRepository implements ProductRepositoryContract
{

	/**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllProducts($order_by = 'sort', $sort = 'asc')
    {
        return Product::orderBy($order_by, $sort)->get();
    }
}