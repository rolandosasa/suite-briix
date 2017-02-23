<?php

namespace App\Repositories\Briix\Access\RatePlan;

use App\Models\Briix\Access\RatePlan\RatePlan;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\RatePlan\RatePlanCreated;
use App\Events\Briix\Access\RatePlan\RatePlanDeleted;
use App\Events\Briix\Access\RatePlan\RatePlanUpdated;
use App\Events\Briix\Access\RatePlan\RatePlanRestored;
use App\Events\Briix\Access\RatePlan\RatePlanPermanentlyDeleted;

/**
 * Class EloquentRatePlanRepository
 * @package app\Repositories\RatePlan
 */
class EloquentRatePlanRepository implements RatePlanRepositoryContract
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
            return RatePlan::onlyTrashed()
                ->select([ 'id', 'description', 'product','cost', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        return RatePlan::select(['id', 'description', 'product','cost', 'created_at', 'updated_at', 'deleted_at'])
            ->get();
    }


    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllRatePlans($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        if ($withPermissions) {
            return RatePlan::with('permissions')
                ->orderBy($order_by, $sort)
                ->get();
        }

        return RatePlan::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $ratePlan = $this->createRatePlanStub($input);
        DB::transaction(function() use ($ratePlan) {
            if ($ratePlan->save()) {
                event(new RatePlanCreated($ratePlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.ratePlans.create_error'));
        });
    }

    /**
     * @param  RatePlan $RatePlan
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(RatePlan $ratePlan, $input)
    {
       DB::transaction(function() use ($ratePlan, $input) {
            if ($ratePlan->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
                $ratePlan->save();

                event(new RatePlanUpdated($ratePlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.ratePlans.update_error'));
        });
    }

    /**
     * @param  RatePlan $RatePlan
     * @throws GeneralException
     * @return bool
     */
    public function destroy(RatePlan $ratePlan)
    {
        if ($ratePlan->delete()) {
            event(new RatePlanDeleted($ratePlan));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.ratePlans.delete_error'));
    }

	/**
     * @param  RatePlan $ratePlan
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(RatePlan $ratePlan)
    {
        //Failsafe
        if (is_null($ratePlan->deleted_at)) {
            throw new GeneralException("This ratePlan must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($ratePlan) {
            

            if ($ratePlan->forceDelete()) {
                event(new RatePlanPermanentlyDeleted($ratePlan));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.ratePlans.delete_error'));
        });
    }


    /**
     * @param  RatePlan $ratePlan
     * @throws GeneralException
     * @return bool
     */
    public function restore(RatePlan $ratePlan)
    {
        //Failsafe
        if (is_null($ratePlan->deleted_at)) {
            throw new GeneralException("This ratePlan is not deleted so it can not be restored.");
        }

        if ($ratePlan->restore()) {
            event(new RatePlanRestored($ratePlan));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.ratePlans.restore_error'));
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createRatePlanStub($input)
    {
        $ratePlan               = new RatePlan;
        $ratePlan->description  = $input['description'];
        $ratePlan->product      = $input['product'];
        $ratePlan->cost         = $input['cost'];
        $ratePlan->save();
        return $ratePlan;
    }

}