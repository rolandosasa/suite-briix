<?php

namespace App\Http\Controllers\Crecursos\Access\Estimated;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Crecursos\Access\Estimated\Estimated;
use App\Http\Requests\Crecursos\Access\Estimated\StoreEstimatedRequest;
use App\Http\Requests\Crecursos\Access\Estimated\UpdateEstimatedRequest;
use App\Http\Requests\Crecursos\Access\Estimated\ManageEstimatedRequest;
use App\Repositories\Crecursos\Access\Estimated\EstimatedRepositoryContract;

class EstimatedController extends Controller
{
		protected $estimateds; 

    public function __construct(EstimatedRepositoryContract $estimateds)
    {
      $this->estimateds = $estimateds;        
    }

		public function index()
		{
			//
		}

		public function create(ManageEstimatedRequest $request)
		{
			$month = $request->month;
			$concept = $request->concept;
			
			if($month == 'Enero')
				$month = 1;
			if($month == 'Febrero')
				$month = 2;
			if($month == 'Marzo')
				$month = 3;
			if($month == 'Abril')
				$month = 4;
			if($month == 'Mayo')
				$month = 5;
			if($month == 'Junio')
				$month = 6;
			if($month == 'Julio')
				$month = 7;
			if($month == 'Agosto')
				$month = 8;
			if($month == 'Septiembre')
				$month = 9;
			if($month == 'Octubre')
				$month = 10;
			if($month == 'Noviembre')
				$month = 11;
			if($month == 'Diciembre')
				$month = 12;

			return view('crecursos.access.estimated.create')
        ->withConcept($concept)
        ->withMonth($month);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(StoreEstimatedRequest $request)
		{
			$this->estimateds->create($request->all());
      return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.concept.created'));
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit(ManageEstimatedRequest $request, $estimated)
		{
			$estimated = Estimated::find($estimated);
			return view('crecursos.access.estimated.edit')
				->withEstimated($estimated)
				->withExecuted($request->exect);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Estimated $estimated, UpdateEstimatedRequest $request)
		{
			if($request->time_programmed == 0){
				$this->estimateds->destroy($estimated);
      	return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.concept.deleted'));
			}
			else{
				$this->estimateds->update($estimated, $request->all());
				return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.concept.updated'));
			}
      
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
				//
		}

		public function executed(UpdateEstimatedRequest $request)
		{
			$estimated = Estimated::find($request->estimated_id);
			$this->estimateds->update($estimated, $request->all());
		}
}
