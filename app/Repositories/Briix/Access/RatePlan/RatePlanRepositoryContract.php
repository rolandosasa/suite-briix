<?php

namespace App\Repositories\Briix\Access\RatePlan;

use App\Models\Briix\Access\RatePlan\RatePlan;

/**
 * Interface RatePlanRepositoryContract
 * @package app\Repositories\RatePlan
 */
interface RatePlanRepositoryContract
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
    public function getAllRatePlans($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  RatePlan $ratePlan
     * @param  $input
     * @return mixed
     */
    public function update(RatePlan $ratePlan, $input);

    /**
     * @param  RatePlan $ratePlan
     * @return mixed
     */
    public function destroy(RatePlan $ratePlan);

    /**
     * @param  RatePlan $contract
     * @return mixed
     */
    public function delete(RatePlan $ratePlan);

    /**
     * @param  RatePlan $ratePlan
     * @return mixed
     */
    public function restore(RatePlan $ratePlan);

    
}