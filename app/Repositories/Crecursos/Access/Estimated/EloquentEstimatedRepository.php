<?php

namespace App\Repositories\Crecursos\Access\Estimated;

use App\Models\Crecursos\Access\Estimated\Estimated;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

use App\Events\Crecursos\Access\Estimated\EstimatedCreated;
use App\Events\Crecursos\Access\Estimated\EstimatedDeleted;
use App\Events\Crecursos\Access\Estimated\EstimatedUpdated;

/**
* Class EloquentEstimatedRepository
* @package app\Repositories\Estimated
*/
class EloquentEstimatedRepository implements EstimatedRepositoryContract
{
  /**
   * @return mixed
   */
  public function getCount() {
      return Estimated::count();
  }

  /**
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getForDataTable($trashed = false) 
  {
    if ($trashed == "true") {
      return Estimated::onlyTrashed()
        ->select([ 'id', 'time_programmed','time_executed','income', 'income_percent','comment','month_id', 'concept_id', 'updated_at', 'deleted_at'])
        ->get();
      }
     
    return Estimated::select([ 'id', 'time_programmed','time_executed','income', 'income_percent','comment','month_id', 'concept_id', 'updated_at', 'deleted_at'])
        ->get();
  }
  
  public function getAllEstimateds($order_by = 'sort', $sort = 'asc', $withConcept = false)
  {
    if ($withConcept) {
      return Estimated::with('concepts')
        ->orderBy($order_by, $sort)
        ->get();
    }

    return Estimated::orderBy($order_by, $sort)->get();
  }
  
  public function create($input)
  {
    $estimated = $this->createEstimatedStub($input);
    DB::transaction(function() use ($estimated) {
      if ($estimated->save()) {
        event(new EstimatedCreated($estimated));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.concept.create_error'));
    });
  }

  public function update(Estimated $estimated, $input)
  {
    DB::transaction(function() use ($estimated, $input) {
      if ($estimated->update($input)) {
        $estimated->save();
        event(new EstimatedUpdated($estimated));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.concept.update_error'));
    });
  }

  /**
   * @param Estimated
   * @throws GeneralException
   * @return bool
   */
  public function destroy(Estimated $estimated)
  {
    if ($estimated->delete()) {
      event(new EstimatedDeleted($estimated));
      return true;
    }

    throw new GeneralException(trans('exceptions.crecursos.access.concept.delete_error'));
  }

  private function createEstimatedStub($input)
  {
    $estimated                    = new Estimated;
    $estimated->time_programmed   = $input['time_programmed'];
    $estimated->concept_id        = $input['concept_id'];
    $estimated->month_id          = $input['month_id'];
    $estimated->save();
    return $estimated;
  }
}
