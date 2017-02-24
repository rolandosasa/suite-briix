<?php

namespace App\Repositories\Cmovil\Access\Line;

use App\Models\Cmovil\Access\Line\Line;
use App\Models\Cmovil\Access\User\User;

/**
 * Interface EnterpriseRepositoryContract
 * @package app\Repositories\Enterprise
 */
interface LineRepositoryContract
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
    public function getAllLines($order_by = 'id', $sort = 'asc', $withPermissions = false);

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
    public function update(Line $line, $input);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function destroy(Line $line);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function delete(Line $line);

    /**
     * @param  Enterprise $enterprise
     * @return mixed
     */
    public function restore(Line $line);

    /**
     * @return mixed
     */
    public function getDefaultUserRole();
}