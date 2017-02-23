<?php

namespace App\Http\Controllers\Crecursos\Access\Job;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Crecursos\Access\Department\Department;
use App\Models\Crecursos\Access\Job\Job;
use App\Repositories\Crecursos\Access\Job\JobRepositoryContract;
use App\Http\Requests\Crecursos\Access\Job\StoreJobRequest;
use App\Http\Requests\Crecursos\Access\Job\UpdateJobRequest;
use App\Http\Requests\Crecursos\Access\Job\ManageJobRequest;

class JobController extends Controller
{
	protected $job; 

   
    public function __construct(JobRepositoryContract $job)
	{
        $this->jobs = $job;        
    }
	
    public function index()
	{
        
        return view('crecursos.access.job.index');
    }
    public function get(ManageJobRequest $request)
    {
      return Datatables::of($this->jobs->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($job) {
          return $job->action_buttons;
        })
      ->make(true);
    }

    public function create()
    {
    	// $dep = Department::lists('name_department','id');
    	return view('crecursos.access.job.create');
    }

    public function store(Request $request)
    {
        // dd($request);
      $this->Jobs->create($request->all());
      return redirect()->route('crecursos.access.job.index')->withFlashSuccess(trans('alerts.backend.job.created'));
    }

    public function edit(Job $job, ManageJobRequest $request)
    {
        // dd($request);
      return view('crecursos.access.job.edit')
        ->withjob($job);
    }
        
    public function update(Job $job, Request $request)
    {
        // dd($job);
      $this->jobs->update($job, $request->all());
      return redirect()->route('crecursos.access.job.index')->withFlashSuccess(trans('alerts.backend.job.updated'));
    }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
     public function destroy(Job $job, ManageJobRequest $request)
    {
      $this->jobs->destroy($job);
      return redirect()->back()->withFlashSuccess(trans('alerts.backend.job.deleted'));
    }
}
