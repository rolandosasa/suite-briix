<?php

namespace App\Http\Controllers\Crecursos\Access\Compettition;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Crecursos\Access\Compettition\CompettitionRepositoryContract;
use App\Models\Crecursos\Access\Compettition\Compettition;
use App\Http\Requests\Crecursos\Access\Compettition\StoreCompettitionRequest;
use App\Http\Requests\Crecursos\Access\Compettition\UpdateCompettitionRequest;
use App\Http\Requests\Crecursos\Access\Compettition\ManageCompettitionRequest;

class CompettitionController extends Controller
{
     protected $compettition; 

   
    public function __construct(CompettitionRepositoryContract $compettition)
	{
        $this->compettitions = $compettition;        
    }
	
	public function index(ManageCompettitionRequest $request)
	{
        
        return view('crecursos.access.compettition.index');
    }

    public function get(ManageCompettitionRequest $request)
    {
      return Datatables::of($this->compettitions->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($compettition) {
          return $compettition->action_buttons;
        })
      ->make(true);
    }

    public function create(ManageCompettitionRequest $request)
    {

        return view('crecursos.access.compettition.create');
    }

    public function store(Request $request)
    {
        // dd($request);
      $this->compettitions->create($request->all());
      return redirect()->route('crecursos.access.compettition.index')->withFlashSuccess(trans('alerts.backend.Compettition.created'));
    }

    public function edit(Compettition $compettition, ManageCompettitionRequest $request)
    {
        // dd($request);
      return view('crecursos.access.compettition.edit')
        ->withCompettition($compettition);
    }
        
    public function update(Compettition $compettition, Request $request)
    {
        // dd($compettition);
      $this->compettitions->update($compettition, $request->all());
      return redirect()->route('crecursos.access.compettition.index')->withFlashSuccess(trans('alerts.backend.Compettition.updated'));
    }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
     public function destroy(Compettition $compettition, ManageCompettitionRequest $request)
    {
      $this->compettitions->destroy($compettition);
      return redirect()->back()->withFlashSuccess(trans('alerts.backend.Compettition.deleted'));
    }
}
