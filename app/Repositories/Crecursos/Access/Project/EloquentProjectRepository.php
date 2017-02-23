<?php

namespace App\Repositories\Crecursos\Access\Project;

use App\Models\Crecursos\Access\Project\Project;
use App\Models\Crecursos\Access\Concept\Concept;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

use App\Events\Crecursos\Access\Project\ProjectCreated;
use App\Events\Crecursos\Access\Project\ProjectDeleted;
use App\Events\Crecursos\Access\Project\ProjectUpdated;

/**
* Class EloquentProjectRepository
* @package app\Repositories\Project
*/
class EloquentProjectRepository implements ProjectRepositoryContract
{
  /**
   * @return mixed
   */
  public function getCount() {
    return Project::count();
  }

  /**
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getForDataTable($trashed = false) 
  {
    if ($trashed == "true") {
      return Project::onlyTrashed()
        ->select([ 'id','name_project','description','contractor','date_init','date_end','advance','total_amount','updated_at', 'deleted_at'])
        ->get();
      }
    
    return Project::select([ 'id','name_project','description','contractor','date_init','date_end','advance','total_amount'])
        ->get();
  }
  
  public function getAllProjects($order_by = 'sort', $sort = 'asc', $withConcepts = false)
  {
    if ($withConcepts) {
      return Project::with('')
        ->orderBy($order_by, $sort)
        ->get();
    }

    return Project::orderBy($order_by, $sort)->get();
  }

  
  public function create($input, $concepts)
  {
    $project = $this->createProjectStub($input);

    DB::transaction(function() use ($project, $concepts)
    {
      if ($project->save()) 
      {
        if(!is_null($concepts['name_concepts']))
        {
          foreach ($concepts['name_concepts'] as $key => $value) {
            $concept = $this->createConceptStub($value, $project);
            $concept->save();
          }
        }
        else{
          throw new GeneralException(trans('exceptions.crecursos.access.project.concept_error'));
        }

        event(new ProjectCreated($project));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.project.create_error'));
    });
  }

  public function update(Project $project, $input, $conceptsUp, $concepts)
  {
    DB::transaction(function() use ($project, $input, $conceptsUp, $concepts) 
    {
      if ($project->update($input)) 
      {
        $project->save();
        $conceptProject = $project->concepts()->get();
        $conceptDelet = array();

        if($conceptsUp != null)
        {
          foreach ($conceptsUp as $key => $value1) {
            foreach ($conceptProject as $key => $value2){
              if($value2->id == $value1['id'])
              {
                $concept = $this->updateConceptStub($value1, $project);
                $concept->save();
                array_push($conceptDelet, $value2->id);
              }
            }
          }

          foreach ($conceptProject as $key => $value) {
            if (!in_array($value->id, $conceptDelet)) {
              $concept = $this->deleteConceptStub($value->id);
              $concept->delete();
            }
          }
        }
        else{
          throw new GeneralException(trans('exceptions.crecursos.access.project.concept_error'));
        }

        if($concepts['name_concepts'] != null)
        { 
          foreach ($concepts['name_concepts'] as $key => $value) {
            $concept = $this->createConceptStub($value, $project);
            $concept->save();
          }
        }

        event(new ProjectUpdated($project));
        return true;
      }

      throw new GeneralException(trans('exceptions.crecursos.access.project.update_error'));
    });
  }

  /**
   * @param Project
   * @throws GeneralException
   * @return bool
   */
  public function destroy(Project $project)
  {
    if ($project->delete()) {
      event(new ProjectDeleted($project));
      return true;
    }

    throw new GeneralException(trans('exceptions.crecursos.access.project.delete_error'));
  }

  private function createProjectStub($input)
  {
    $project                = new Project;
    $project->name_project  = $input['name_project'];
    $project->description   = $input['description'];
    $project->contractor    = $input['contractor'];
    $project->date_init     = $input['date_init'];
    $project->date_end      = $input['date_end'];
    $project->advance       = $input['advance'];
    $project->total_amount  = $input['total_amount'];
    return $project;
  }

  private function createConceptStub($name_concept, $project)
  {
    $concept                = new Concept;
    $concept->name_concept  = $name_concept;
    $concept->project_id    = $project->id;
    return $concept;
  }

  private function updateConceptStub($conceptUp, $project)
  {
    $concept                = Concept::find($conceptUp['id']);
    $concept->name_concept  = $conceptUp['name'];
    $concept->project_id    = $project->id;
    return $concept;
  }

  private function deleteConceptStub($concept)
  {
    $concept  = Concept::find($concept);
    return $concept;
  }
}