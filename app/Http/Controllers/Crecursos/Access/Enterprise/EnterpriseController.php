<?php

namespace App\Http\Controllers\Crecursos\Access\Enterprise;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Crecursos\Access\Enterprise\Enterprise;
use App\Http\Requests\Crecursos\Access\Enterprise\StoreEnterpriseRequest;
use App\Http\Requests\Crecursos\Access\Enterprise\UpdateEnterpriseRequest;
use App\Http\Requests\Crecursos\Access\Enterprise\ManageEnterpriseRequest;
use App\Repositories\Crecursos\Access\Enterprise\EnterpriseRepositoryContract;
use App\Repositories\Crecursos\Access\Department\DepartmentRepositoryContract;

use Yajra\Datatables\Facades\Datatables;

class EnterpriseController extends Controller
{
  protected $enterprises;

  protected $departments;
 
  public function __construct(EnterpriseRepositoryContract $enterprises, DepartmentRepositoryContract $departments)
  {
    $this->enterprises = $enterprises;
    $this->departments = $departments;      
  }
  
  public function index(ManageEnterpriseRequest $request)
  {
    return view('crecursos.access.enterprise.index');
  }

  public function get(ManageEnterpriseRequest $request)
  {
    return Datatables::of($this->enterprises->getForDataTable($request->get('trashed')))
        ->addColumn('departments', function($enterprise) {
            $departments = [];

            if ($enterprise->departments()->count() > 0) {
              foreach ($enterprise->departments as $department) {
                array_push($departments, $department->name_department);
              }
              return implode("<br/>", $departments);
            } 
            else{
              return trans('labels.general.none');
            }
          })
          ->addColumn('actions', function($user) {
              return $user->action_buttons;
            })
      ->make(true);
  }

  public function create(ManageEnterpriseRequest $request)
  {
    $val = false;
    return view('crecursos.access.enterprise.create')
      ->withValue($val)
      ->withDepartments($this->departments->getAllDepartments('name_department', 'asc', true));
  }

  public function store(StoreEnterpriseRequest $request)
  {
    $this->enterprises->create($request->all(),
                                  $request->only('assignees_departments'));
    return redirect()->route('crecursos.access.enterprise.index')
        ->withFlashSuccess(trans('alerts.crecursos.enterprise.created'));
  }

  public function edit(Enterprise $enterprise, ManageEnterpriseRequest $request)
  {
    $val = true;
    return view('crecursos.access.enterprise.edit')
      ->withEnterprise($enterprise)
      ->withEnterpriseDepartments($enterprise->departments->lists('id')->all())
      ->withDepartments($this->departments->getAllDepartments('name_department', 'asc', true))
      ->withValue($val);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Enterprise $enterprise, UpdateEnterpriseRequest $request)
  {
    $this->enterprises->update($enterprise, 
                                $request->except('assignees_departments'),
                                $request->only('assignees_departments'));
    return redirect()->route('crecursos.access.enterprise.index')
      ->withFlashSuccess(trans('alerts.crecursos.enterprise.updated'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Enterprise $enterprise, ManageEnterpriseRequest $request)
  {
    $this->enterprises->destroy($enterprise);
    return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.enterprise.deleted'));
  }
}
