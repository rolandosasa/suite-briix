<?php

namespace App\Repositories\Crecursos\Access\HumanResources;

use App\Models\Crecursos\Access\HumanResources\HumanResources;

/**
 * Interface HumanResourcesRepositoryContract
 * @package app\Repositories\HumanResources
 */
interface HumanResourcesRepositoryContract
{

    /**
     * @return mixed
     */
    public function getCount();

    /**
     * @return mixed
     */
    public function getForDataTable();

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllHumanResources($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  HumanResources $HumanResources
     * @param  $input
     * @return mixed
     */
    public function update(HumanResources $HumanResources, $input);

    /**
     * @param  HumanResources $HumanResources
     * @return mixed
     */
    public function destroy(HumanResources $HumanResources);

    /**
     * @return mixed
     */
    
}