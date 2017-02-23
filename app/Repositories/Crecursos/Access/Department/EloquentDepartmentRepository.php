<?php

namespace App\Repositories\Crecursos\Access\Department;

use App\Models\Crecursos\Access\Department\Department;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

use App\Events\Crecursos\Access\Department\DepartmentCreated;
use App\Events\Crecursos\Access\Department\DepartmentDeleted;
use App\Events\Crecursos\Access\Department\DepartmentUpdated;

/**
* Class EloquentDepartmentRepository
* @package app\Repositories\Department
*/
class EloquentDepartmentRepository implements DepartmentRepositoryContract
{
  /**
   * @return mixed
   */
  public function getCount() {
      return Department::count();
  }

  /**
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getForDataTable($trashed = false) 
  {
    if ($trashed == "true") {
      return Department::onlyTrashed()
        ->select([ 'id','name_department','area','description','created_at', 'updated_at', 'deleted_at'])
        ->get();
      }
     
    return Department::select(['id','id_department','name_department','area','description'])
      ->get();
  }
  
  public function getAllDepartments($order_by = 'sort', $sort = 'asc', $withDepartments = false)
  {
    if ($withDepartments) {
      return Department::with('enterprises')
          ->orderBy($order_by, $sort)
          ->get();
    }

    return Department::orderBy($order_by, $sort)->get();
  }

  
  public function create($input)
  {
    $department = $this->createDepartmentStub($input);
    DB::transaction(function() use ($department) {
      if ($department->save()) {
        event(new DepartmentCreated($department));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.department.create_error'));
    });
  }

  public function update(Department $department, $input)
  {
    DB::transaction(function() use ($department, $input) {
      if ($department->update($input)) {
        $department->save();
        event(new DepartmentUpdated($department));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.department.update_error'));
    });
  }

  /**
   * @param Department
   * @throws GeneralException
   * @return bool
   */
  public function destroy(Department $department)
  {
    if ($department->delete()) {
      event(new DepartmentDeleted($department));
      return true;
    }

    throw new GeneralException(trans('exceptions.crecursos.access.department.delete_error'));
  }

  private function createDepartmentStub($input)
  {
    $department                   = new Department;
    $department->id_department    = strtoupper(substr($input['name_department'],0,4));
    $department->name_department  = $input['name_department'];
    $department->area             = $input['area'];
    $department->description      = $input['description'];
    $department->save();
    return $department;
  }
}
