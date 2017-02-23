<?php

namespace App\Repositories\Crecursos\Access\Month;

use App\Models\Crecursos\Access\Month\Month;

/**
 * Interface MonthsRepositoryContract
 * @package app\Repositories\Months
 */
interface MonthRepositoryContract
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
    public function getAllMonths($order_by = 'id', $sort = 'asc');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Months $Months
     * @param  $input
     * @return mixed
     */
    public function update(Month $month, $input);

    /**
     * @param  Months $Months
     * @return mixed
     */
    public function destroy(Month $month);

    /**
     * @return mixed
     */
    
}