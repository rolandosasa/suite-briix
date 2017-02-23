<?php

namespace App\Repositories\Briix\Access\Enterprise;

use App\Models\Briix\Access\Enterprise\Enterprise;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\Enterprise\EnterpriseCreated;
use App\Events\Briix\Access\Enterprise\EnterpriseDeleted;
use App\Events\Briix\Access\Enterprise\EnterpriseUpdated;
use App\Events\Briix\Access\Enterprise\EnterpriseRestored;
use App\Events\Briix\Access\Enterprise\EnterprisePermanentlyDeleted;

/**
 * Class EloquentEnterpriseRepository
 * @package app\Repositories\Enterprise
 */
class EloquentEnterpriseRepository implements EnterpriseRepositoryContract
{
    
	/**
     * @return mixed
     */
    public function getCount() {
        return Enterprise::count();
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
            return Enterprise::onlyTrashed()
                ->select([ 'id', 'name', 'contact', 'email', 'phone','phone2', 'rfc','address', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        return Enterprise::select(['id', 'name', 'contact', 'email', 'phone', 'phone2', 'rfc', 'address', 'created_at', 'updated_at', 'deleted_at'])
            ->get();
    }


    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllEnterprises($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        return Enterprise::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
		$enterprise = $this->createEnterpriseStub($input);
        DB::transaction(function() use ($enterprise) {
            if ($enterprise->save()) {
                event(new EnterpriseCreated($enterprise));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.enterprises.create_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Enterprise $enterprise, $input)
    {
        DB::transaction(function() use ($enterprise, $input) {
            if ($enterprise->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
                $enterprise->save();

                event(new EnterpriseUpdated($enterprise));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.enterprises.update_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Enterprise $enterprise)
    {
        if ($enterprise->delete()) {
            event(new EnterpriseDeleted($enterprise));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.enterprises.delete_error'));
        
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(Enterprise $enterprise)
    {
        //Failsafe
        if (is_null($enterprise->deleted_at)) {
            throw new GeneralException("This enterprise must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($enterprise) {
            

            if ($enterprise->forceDelete()) {
                event(new EnterprisePermanentlyDeleted($enterprise));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.enterprises.delete_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return bool
     */
    public function restore(Enterprise $enterprise)
    {
        //Failsafe
        if (is_null($enterprise->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if ($enterprise->restore()) {
            event(new EnterpriseRestored($enterprise));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.users.restore_error'));
    }


	/**
	 * @return mixed
	 */
	public function getDefaultUserRole() 
    {
		
	}

	/**
     * @param  $input
     * @return mixed
     */
    private function createEnterpriseStub($input)
    {
        $enterprise             = new Enterprise;
        $enterprise->name       = $input['name'];
        $enterprise->contact    = $input['contact'];
        $enterprise->email      = $input['email'];
        $enterprise->phone      = $input['phone'];
        $enterprise->phone2     = $input['phone2'];
        $enterprise->rfc 		= $input['rfc'];
        $enterprise->address    = $input['address'];
        $enterprise->save();
        return $enterprise;
    }
}