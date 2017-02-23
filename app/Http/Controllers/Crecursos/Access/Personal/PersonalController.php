<?php

namespace App\Http\Controllers\Crecursos\Access\Personal;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Access\Personal\Personal;
use App\Http\Requests\Crecursos\Access\Personal\StorePersonalRequest;
use App\Http\Requests\Crecursos\Access\Personal\UpdatePersonalRequest;
use App\Http\Requests\Crecursos\Access\Personal\ManagePersonalRequest;
use App\Repositories\Crecursos\Access\Personal\PersonalRepositoryContract;

use Yajra\Datatables\Facades\Datatables;

class PersonalController extends Controller
{
		protected $personals;

		public function __construct(PersonalRepositoryContract $personals)
		{
			$this->personals = $personals;
		}

		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(ManagePersonalRequest $request)
		{
			return view('crecursos.access.personal.index');
		}

		/**
			* @param ManageConditionRequest $request
			* @return mixed
		*/
		public function get(ManagePersonalRequest $request)
		{
			return Datatables::of($this->personals->getForDataTable($request->get('trashed')))
				->addColumn('actions', function($personal) {
						return $personal->action_buttons;
					})
			->make(true);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create(ManagePersonalRequest $request)
		{
			return view('crecursos.access.personal.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(StorePersonalRequest $request)
		{
			$this->personals->create($request->all());
			return redirect()->route('crecursos.access.personal.create')->withFlashSuccess(trans('alerts.crecursos.personal.created'));
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
		public function edit(Personal $personal, ManagePersonalRequest $request)
		{
			return view('crecursos.access.personal.edit')
				->withPersonal($personal);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Personal $personal, UpdatePersonalRequest $request)
		{
			$this->personals->update($personal, $request->all());
				return redirect()->route('crecursos.access.personal.index')->withFlashSuccess(trans('alerts.crecursos.personal.updated'));
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Personal $personal, ManagePersonalRequest $request)
		{
			$this->personals->destroy($personal);
			return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.personal.deleted'));
		}

		public function deleted(ManagePersonalRequest $request)
		{
			return view('crecursos.access.personal.deleted');
		}
}
