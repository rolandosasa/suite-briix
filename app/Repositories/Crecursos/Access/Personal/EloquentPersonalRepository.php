<?php

namespace App\Repositories\Crecursos\Access\Personal;

use App\Models\Crecursos\Access\Personal\Personal;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

use App\Events\Crecursos\Access\Personal\PersonalCreated;
use App\Events\Crecursos\Access\Personal\PersonalUpdated;
use App\Events\Crecursos\Access\Personal\PersonalDeleted;

/**
 * Class EloquentPersonalRepository
 * @package app\Repositories\Personal
 */

class EloquentPersonalRepository implements PersonalRepositoryContract
{
  /**
    * @return mixed
    */
  /**
  * @return \Illuminate\Database\Eloquent\Collection|static[]
  */

  public function getForDataTable($status = 1, $trashed = false)
  {
    /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
    **/   
    if ($trashed == "true") {
      return Personal::onlyTrashed()
        ->select(['id','name', 'address', 'email', 'level_studies', 'career', 'created_at', 'updated_at', 'deleted_at'])
        ->get();
    }

    return Personal::select(['id', 'name', 'address', 'email', 'level_studies', 'career', 'created_at', 'updated_at', 'deleted_at'])
    ->get();
  }
  
  /**
    * @return \Illuminate\Database\Eloquent\Collection|static[]
    */
  /**
    * @param  string  $order_by
    * @param  string  $sort
    * @param  bool    $withPermissions
    * @return mixed
    */
  public function getAllPersonal($order_by = 'sort', $sort = 'asc', $withPermissions = false)
  {
    return Personal::all();
  }
    
  /**
    * @param  $input
    * @throws GeneralException
    * @return bool
  */
  public function create($input)
  {
    $personal = $this->createPersonalStub($input);

    DB::transaction(function() use ($personal) {
      if ($personal->save()) {
        event(new PersonalCreated($personal));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.personal.create_error'));
    });
  }
    
  /**
    * @param  dtuCondition $dtuCondition
    * @param  $input
    * @throws GeneralException
    * @return bool
  */
  public function update(Personal $personal, $input)
  {
    DB::transaction(function() use ($personal, $input) {
      if ($personal->update($input)) {
        $personal->id_personal    = strtoupper(substr($input['name'],0,2). substr($input['firstlastname'],0,2). substr($input['secondlastname'],0,2));
        $personal->save();
        event(new PersonalUpdated($personal));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.personal.update_error'));
    });
  }
  
  /**
    * @param  dtuCondition $dtuCondition
    * @throws GeneralException
    * @return bool
  */
  public function destroy(Personal $personal)
  {
    if ($personal->delete()) {
      event(new PersonalDeleted($user));
      return true;
    }

    throw new GeneralException(trans('exceptions.crecursos.access.personal.delete_error'));
  }
    
  /**
    * @param  dtuCondition $dtuCondition
    * @throws GeneralException
    * @return bool
    */
  public function restore(Personal $personal)
  {
      
  }
    
  /**
    * @param  $input
    * @return mixed
  */
  private function createPersonalStub($input)
  {
    $personal = new Personal;
    $personal->id_personal    = strtoupper(substr($input['name'],0,2). substr($input['firstlastname'],0,2). substr($input['secondlastname'],0,2));
    $personal->name           = $input['name'];
    $personal->firstlastname  = $input['firstlastname'];
    $personal->secondlastname = $input['secondlastname'];
    $personal->gender         = $input['gender'];
    $personal->birthdate      = $input['birthdate'];
    $personal->age            = $input['age'];
    $personal->civil_status   = $input['civil_status'];
    $personal->birthplace     = $input['birthplace'];
    $personal->address        = $input['address'];
    $personal->email          = $input['email'];
    $personal->phone          = $input['phone'];
    $personal->photo          = $input['photo'];
    $personal->curp           = $input['curp'];
    $personal->imss           = $input['imss'];
    $personal->rfc            = $input['rfc'];
    $personal->level_studies  = $input['level_studies'];
    $personal->school         = $input['school'];
    $personal->career         = $input['career'];
    $personal->identity_card  = $input['identity_card'];
    $personal->save();

    return $personal;
  }
}