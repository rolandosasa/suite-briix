<?php

namespace App\Repositories\Crecursos\Access\Job;


use App\Models\Crecursos\Access\Job\Job;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Crecursos\Access\Job\JobCreated;
use App\Events\Crecursos\Access\Job\JobDeleted;
use App\Events\Crecursos\Access\Job\JobUpdated;
use App\Events\Crecursos\Access\Job\JobRestored;
use App\Events\Crecursos\Access\Job\JobPermanentlyDeleted;


/**
 * Class EloquentJobsRepository
 * @package app\Repositories\Jobs
 */
class EloquentJobRepository implements JobRepositoryContract
{
    /** 
     * @return mixed
     */
    public function getCount() {
        return Job::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false) {
        if ($trashed == "true") {
            return Jobs::onlyTrashed()
                ->select([ 'id', 'name_jobs', 'department','job_description','immediate_boss','supervises','responsabilities','salary_basic','salary_global','created_at', 'updated_at'])
                ->get();
        }

        return Job::select(['id', 'name_jobs','department','job_description','immediate_boss','supervises','responsabilities','salary_basic','salary_global','created_at', 'updated_at'])
            ->get();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllJob($order_by = 'id')
    {
      
        return Job::all(); 
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
         $Job = $this->createJobsStub($input);
            DB::transaction(function() use ($Job) {
            if ($Job->save()) {
                event(new JobCreated($Job));
                return true;
            }
            throw new GeneralException(trans('exceptions.Crecursos.access.Jobs.create_error'));
        });
    }

    /**
     * @param  Jobs 
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Job $job, $input)
    {
            DB::transaction(function() use ($job, $input) {
      if ($job->update($input)) {
        //For whatever reason this just wont work in the above call, so a second is needed for now
        $job->save();
      }
    });  
    }

    /**
     * @param Jobs
     * @throws GeneralException
     * @return bool
     */

    public function destroy(Job $job)
    {
     if ($job->delete()) {
      event(new JobDeleted($job));
      return true;
    }

    throw new GeneralException(trans('exceptions.backend.access.Job.delete_error'));
    }

    private function createJobsStub($input)
     {
        $Job = new Job;
        $Job->name_jobs        = $input['name_jobs'];
        $Job->department       = $input['department'];
        $Job->job_description  = $input['job_description'];
        $Job->immediate_boss   = $input['immediate_boss'];
        $Job->supervises       = $input['supervises'];
        $Job->responsabilities = $input['responsabilities'];
        $Job->salary_basic     = $input['salary_basic'];
        $Job->salary_global    = $input['salary_global'];
         $Job->save();
         return $Job;
    }
}