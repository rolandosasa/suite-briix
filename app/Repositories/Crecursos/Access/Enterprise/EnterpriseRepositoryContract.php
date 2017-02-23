<?php

namespace App\Repositories\Crecursos\Access\Enterprise;

use App\Models\Crecursos\Access\Enterprise\Enterprise;

/**
 * Interface EnterpriseRepositoryContract
 * @package app\Repositories\Enterprise
 */
interface EnterpriseRepositoryContract
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
    public function getAllEnterprises($order_by = 'id', $sort = 'asc', $withEnterprises = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input, $departments);

    /**
     * @param  Enterprise $enterprise
     * @param  $input
     * @return mixed
     */
    public function update(Enterprise $enterprise, $input, $departments);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function destroy(Enterprise $enterprise);
}