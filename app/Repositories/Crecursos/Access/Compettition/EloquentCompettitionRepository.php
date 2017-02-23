<?php

namespace App\Repositories\Crecursos\Access\Compettition;


use App\Models\Crecursos\Access\Compettition\Compettition;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Crecursos\Access\Compettition\CompettitionCreated;
use App\Events\Crecursos\Access\Compettition\CompettitionDeleted;
use App\Events\Crecursos\Access\Compettition\CompettitionUpdated;
use App\Events\Crecursos\Access\Compettition\CompettitionRestored;
use App\Events\Crecursos\Access\Compettition\CompettitionPermanentlyDeleted;


/**
 * Class EloquentCompettitionsRepository
 * @package app\Repositories\Compettitions
 */
class EloquentCompettitionRepository implements CompettitionRepositoryContract
{
    /** 
     * @return mixed
     */
    public function getCount() {
        return Compettition::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false) {
        if ($trashed == "true") {
            return Compettitions::onlyTrashed()
                ->select([ 'id', 'category', 'name','type','created_at', 'updated_at'])
                ->get();
        }

        return Compettition::select(['id', 'category','name','type','created_at', 'updated_at'])
            ->get();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllCompettition($order_by = 'id')
    {
      
        return Compettition::all(); 
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
         $Compettition = $this->createCompettitionsStub($input);
            DB::transaction(function() use ($Compettition) {
            if ($Compettition->save()) {
                event(new CompettitionCreated($Compettition));
                return true;
            }
            throw new GeneralException(trans('exceptions.Crecursos.access.Compettitions.create_error'));
        });
    }

    /**
     * @param  Compettitions 
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Compettition $compettition, $input)
    {
            DB::transaction(function() use ($compettition, $input) {
      if ($compettition->update($input)) {
        //For whatever reason this just wont work in the above call, so a second is needed for now
        $compettition->save();
      }
    });  
    }

    /**
     * @param Compettitions
     * @throws GeneralException
     * @return bool
     */

    public function destroy(Compettition $Compettition)
    {
     if ($Compettition->delete()) {
      event(new CompettitionDeleted($Compettition));
      return true;
    }

    throw new GeneralException(trans('exceptions.backend.access.Compettition.delete_error'));
    }

    private function createCompettitionsStub($input)
     {
         $Compettition = new Compettition;
         $Compettition->category = $input['category'];
         $Compettition->name = $input['name'];
         $Compettition->type = $input['type'];
         $Compettition->save();
         return $Compettition;
    }
}