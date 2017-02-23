<?php

namespace App\Repositories\Briix\Access\DiscountPlan;

use App\Models\Briix\Access\DiscountPlan\DiscountPlan;

/**
 * Interface DiscountPlanRepositoryContract
 * @package app\Repositories\DiscountPlan
 */
interface DiscountPlanRepositoryContract
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
    public function getAllDiscountPlans($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  DiscountPlan $discountPlan
     * @param  $input
     * @return mixed
     */
    public function update(DiscountPlan $discountPlan, $input);

    /**
     * @param  DiscountPlan $discountPlan
     * @return mixed
     */
    public function destroy(DiscountPlan $discountPlan);

    /**
     * @param  DiscountPlan $discountPlan
     * @return mixed
     */
    public function delete(DiscountPlan $discountPlan);

    /**
     * @param  DiscountPlan $discountPlan
     * @return mixed
     */
    public function restore(DiscountPlan $discountPlan);

    
}