<?php

namespace App\Http\Controllers\Crecursos\Access\Project;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Crecursos\Access\Project\Project;
use App\Http\Requests\Crecursos\Access\Project\StoreProjectRequest;
use App\Http\Requests\Crecursos\Access\Project\UpdateProjectRequest;
use App\Http\Requests\Crecursos\Access\Project\ManageProjectRequest;
use App\Repositories\Crecursos\Access\Project\ProjectRepositoryContract;

use Yajra\Datatables\Facades\Datatables;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  protected $projects; 

  public function __construct(ProjectRepositoryContract $projects)
  {
    $this->projects = $projects;
  }

  public function index()
  {
    return view('crecursos.access.project.index');
  }

  public function get(ManageProjectRequest $request)
  {
    return Datatables::of($this->projects->getForDataTable($request->get('trashed')))
      ->addColumn('actions', function($project) {
        return $project->action_buttons;
      })
    ->make(true);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(ManageProjectRequest $request)
  {
    $val = false;
    return view('crecursos.access.project.create')
      ->withVal($val);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProjectRequest $request)
  {
    $this->projects->create(
        $request->except('name_concepts'),
        $request->only('name_concepts')
      );
    return redirect()->route('crecursos.access.project.index')->withFlashSuccess(trans('alerts.crecursos.project.created'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project, ManageProjectRequest $request)
  {
    $val = true;
    return view('crecursos.access.project.edit')
      ->withProject($project)
      ->withProjectConcepts($project->concepts()->get())
      ->withVal($val);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Project $project, UpdateProjectRequest $request)
  {
    $name = $request->name_concepts_up;
    $id = $request->id_concepts_up;
    $conceptsUp = array();

    for ($i=0; $i <count($name) ; $i++) { 
      array_push($conceptsUp, array('id' => $id[$i], 'name' => $name[$i]));
    }

    $this->projects->update($project, 
                                $request->except('name_concepts_up', 'id_concepts_up','name_concepts'),
                                $conceptsUp,
                                $request->only('name_concepts'));
    return redirect()->route('crecursos.access.project.index')
      ->withFlashSuccess(trans('alerts.crecursos.project.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Project $project, ManageProjectRequest $request)
  {
    $this->projects->destroy($project);
      return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.project.deleted'));
  }
}
