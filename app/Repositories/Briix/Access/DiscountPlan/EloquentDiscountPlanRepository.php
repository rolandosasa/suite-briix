<?php

namespace App\Repositories\Briix\Access\DiscountPlan;

use App\Models\Briix\Access\DiscountPlan\DiscountPlan;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\DiscountPlan\DiscountPlanCreated;
use App\Events\Briix\Access\DiscountPlan\DiscountPlanDeleted;
use App\Events\Briix\Access\DiscountPlan\DiscountPlanUpdated;
use App\Events\Briix\Access\DiscountPlan\DiscountPlanRestored;
use App\Events\Briix\Access\DiscountPlan\DiscountPlanPermanentlyDeleted;

/**
 * Class EloquentDiscountPlanRepository
 * @package app\Repositories\DiscountPlan
 */
class EloquentDiscountPlanRepository implements DiscountPlanRepositoryContract
{
    
	/**
     * @return mixed
     */
    public function getCount() {
        return RatePlan::count();
    }

	/**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        if ($trashed == "true") {
            return DiscountPlan::onlyTrashed()
                ->select([ 'id', 'description', 'product','cost', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        return DiscountPlan::select(['id', 'product', 'rankStartMonth', 'rankEndMonth', 'rankStartUser', 'rankEndUser', 'status', 'discount', 'created_at', 'updated_at', 'deleted_at'])
            ->get();
    }


    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllDiscountPlans($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        if ($withPermissions) {
            return DiscountPlan::with('permissions')
                ->orderBy($order_by, $sort)
                ->get();
        }

        return DiscountPlan::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $discountPlan = $this->createDiscountPlanStub($input);
        DB::transaction(function() use ($discountPlan) {
            if ($discountPlan->save()) {
                event(new DiscountPlanCreated($discountPlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.discountPlans.create_error'));
        });
    }

    /**
     * @param  DiscountPlan $discountPlan
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(DiscountPlan $discountPlan, $input)
    {
       DB::transaction(function() use ($discountPlan, $input) {
            if ($discountPlan->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
                $discountPlan->save();

                event(new DiscountPlanUpdated($discountPlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.discountPlans.update_error'));
        });
    }

    /**
     * @param  DiscountPlan $DiscountPlan
     * @throws GeneralException
     * @return bool
     */
    public function destroy(DiscountPlan $discountPlan)
    {
        if ($discountPlan->delete()) {
            event(new DiscountPlanDeleted($discountPlan));
            return true;
        }

        throw new GeneralException(trans('exceptions.briix.access.discountPlans.delete_error'));
    }

	/**
     * @param  DiscountPlan $discountPlan
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(DiscountPlan $ratePlan)
    {
        //Failsafe
        if (is_null($discountPlan->deleted_at)) {
            throw new GeneralException("This ratePlan must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($ratePlan) {
            

            if ($discountPlan->forceDelete()) {
                event(new DiscountPlanPermanentlyDeleted($discountPlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.briix.access.discountPlans.delete_error'));
        });
    }


    /**
     * @param  DiscountPlan $discountPlan
     * @throws GeneralException
     * @return bool
     */
    public function restore(DiscountPlan $discountPlan)
    {
        //Failsafe
        if (is_null($discountPlan->deleted_at)) {
            throw new GeneralException("This ratePlan is not deleted so it can not be restored.");
        }

        if ($discountPlan->restore()) {
            event(new DiscountPlanRestored($discountPlan));
            return true;
        }

        throw new GeneralException(trans('exceptions.briix.access.discountPlans.restore_error'));
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createDiscountPlanStub($input)
    {
        $discountPlan                   = new DiscountPlan;
        $discountPlan->product          = $input['product'];
        $discountPlan->rankStartMonth   = $input['rankStartMonth'];
        $discountPlan->rankEndMonth     = $input['rankEndMonth'];
        $discountPlan->rankStartUser    = $input['rankStartUser'];
        $discountPlan->rankEndUser      = $input['rankEndUser'];
        $discountPlan->status           = $input['status'];
        $discountPlan->discount         = $input['discount'];
        $discountPlan->save();
        return $discountPlan;
    }

}