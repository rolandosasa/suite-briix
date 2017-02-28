<?php

namespace App\Repositories\Cmovil\Access\Line;

use App\Models\Cmovil\Access\Line\Line;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Cmovil\Access\Line\LineCreated;
use App\Events\Cmovil\Access\Line\LineDeleted;
use App\Events\Cmovil\Access\Line\LineUpdated;
use App\Events\Cmovil\Access\Line\LineRestored;
use App\Events\Cmovil\Access\Line\LinePermanentlyDeleted;

/**
 * Class EloquentEnterpriseRepository
 * @package app\Repositories\Enterprise
 */
class EloquentLineRepository implements LineRepositoryContract
{
    
	/**
     * @return mixed
     */
    public function getCount()
    {
        return Line::count();
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
            return Line::onlyTrashed()
                ->select(['id', 'enterprise_id', 'user_id', 'name', 'phone', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        return Line::select(['id', 'enterprise_id', 'user_id', 'name', 'phone', 'created_at', 'updated_at', 'deleted_at'])
            ->get();
    }


    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllLines($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        return Line::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
		$line = $this->createLineStub($input);
        DB::transaction(function() use ($line) {
            if ($line->save()) {
                event(new LineCreated($line));
                return true;
            }

            throw new GeneralException(trans('exceptions.Cmovil.access.lines.create_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Line $line, $input)
    {
        DB::transaction(function() use ($line, $input) {
            if ($line->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
                $line->save();

                event(new LineUpdated($line));
                return true;
            }

            throw new GeneralException(trans('exceptions.Cmovil.access.lines.update_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Line $line)
    {
        if ($line->delete()) {
            event(new LineDeleted($line));
            return true;
        }

        throw new GeneralException(trans('exceptions.Cmovil.access.lines.delete_error'));
        
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(Line $line)
    {
        //Failsafe
        if (is_null($line->deleted_at)) {
            throw new GeneralException("This Line must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($line) {
            

            if ($line->forceDelete()) {
                event(new LinePermanentlyDeleted($line));
                return true;
            }

            throw new GeneralException(trans('exceptions.Cmovil.access.lines.delete_error'));
        });
    }

    /**
     * @param  Enterprise $enterprise
     * @throws GeneralException
     * @return bool
     */
    public function restore(Line $line)
    {
        //Failsafe
        if (is_null($line->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if ($line->restore()) {
            event(new LineRestored($line));
            return true;
        }

        throw new GeneralException(trans('exceptions.Cmovil.access.lines.restore_error'));
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
    private function createLineStub($input)
    {
        $line                   = new Line;
        $line->enterprise_id    = $input['enterprise_id'];
        $line->user_id          = $input['user_id'];
        $line->name             = $input['name'];
        $line->phone            = $input['phone'];
        $line->save();
        return $line;
    }
}
