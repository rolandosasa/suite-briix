<?php

namespace App\Repositories\Cmovil\Access\Enterprise;

use App\Models\Cmovil\Access\Enterprise\Enterprise;
use App\Models\Cmovil\Access\User\User;

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
    public function getAllEnterprises($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Enterprise $enterprise
     * @param  $input
     * @return mixed
     */
    public function update(Enterprise $enterprise, $input);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function destroy(Enterprise $enterprise);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function delete(Enterprise $enterprise);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function restore(Enterprise $enterprise);

    /**
     * @return mixed
     */
    public function getDefaultUserRole();
}