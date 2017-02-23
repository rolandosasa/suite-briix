<?php

namespace App\Http\Controllers\Crecursos\Access\Department;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Crecursos\Access\Department\Department;
use App\Http\Requests\Crecursos\Access\Department\StoreDepartmentRequest;
use App\Http\Requests\Crecursos\Access\Department\UpdateDepartmentRequest;
use App\Http\Requests\Crecursos\Access\Department\ManageDepartmentRequest;
use App\Repositories\Crecursos\Access\Department\DepartmentRepositoryContract;

use Yajra\Datatables\Facades\Datatables;

class DepartmentController extends Controller
{
    protected $departments; 

    public function __construct(DepartmentRepositoryContract $departments)
    {
      $this->departments = $departments;        
    }
  
    public function index(ManageDepartmentRequest $request)
    {
      return view('crecursos.access.department.index');
    }

    public function get(ManageDepartmentRequest $request)
    {
      return Datatables::of($this->departments->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($department) {
          return $department->action_buttons;
        })
      ->make(true);
    }

    public function create(ManageDepartmentRequest $request)
    {
      return view('crecursos.access.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
      $this->departments->create($request->all());
      return redirect()->route('crecursos.access.department.index')->withFlashSuccess(trans('alerts.crecursos.department.created'));
    }

    public function edit(Department $department, ManageDepartmentRequest $request)
    {
      return view('crecursos.access.department.edit')
        ->withDepartment($department);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
      $this->departments->update($department, $request->all());
      return redirect()->route('crecursos.access.department.index')->withFlashSuccess(trans('alerts.crecursos.department.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department, ManageDepartmentRequest $request)
    {
      $this->departments->destroy($department);
      return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.department.deleted'));
    }
}
