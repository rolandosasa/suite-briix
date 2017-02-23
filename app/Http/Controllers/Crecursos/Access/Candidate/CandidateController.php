<?php

namespace App\Http\Controllers\Crecursos\Access\Candidate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Crecursos\Access\Candidate\CandidateRepositoryContract;
use App\Models\Crecursos\Access\Candidate\Candidate;
use App\Models\Crecursos\Access\State\State;
use App\Models\Crecursos\Access\Municipality\Municipality;
use Mail;
use DB; 

class CandidateController extends Controller
{
    //
    protected $Candidate; 

   
    public function __construct(CandidateRepositoryContract $Candidate)
	{
        $this->Candidates = $Candidate; 
        // $this->Compettition = $Compettition;       
    }
	
	public function index()
	{
        
        return view('crecursos.access.candidate.index');
    }

    public function get(Request $request)
	{
		return Datatables::of($this->Candidates->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($Candidate) {
                return $Candidate->action_buttons;
            })
			->make(true);
	}

    public function create(Request $request)
    {
         $State = State::lists('namestate', 'id');
            // $Compettition = Compettition::where('type', 'Competencia')->lists('category', 'category');
            // $name = Compettition::lists('name', 'id');
            $Municipality = Municipality::lists('namemunicipality', 'id');
        return view('crecursos.access.candidate.create', compact('State', 'Municipality' ));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->Candidates->create($request->all());
        $email = $request->input('email');
        // Mail::send('crecursos.access.Candidate.emails.confirmacion',$request->all(), function($msj) use ($email){
        //     $msj->subject('Candidato creado');
        //     $msj->to($email); 
        // });
        return redirect()->route('crecursos.access.candidate.index')->withFlashSuccess(trans('alerts.backend.Candidate.created'));
    }

    public function validation(Candidate $Candidate, Request $request)
            {
                // dd($request);
               // $State = State::lists('namestate', 'id');
               //  $Municipality = Municipality::lists('namemunicipality', 'id');
               //  return view('crecursos.access.Candidate.validation', compact('State', 'Municipality'))
               //  ->withCandidate($Candidate);
            }

    public function edit(Candidate $Candidate, Request $request)
        {// {dd($Candidate);
        $State = State::lists('namestate', 'id');
        $Municipality = Municipality::lists('namemunicipality', 'id');
        return view('crecursos.access.candidate.edit', compact('State', 'Municipality'))
        ->withCandidate($Candidate);
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Candidate $Candidate, Request $request)
        {
            $this->Candidates->update($Candidate, $request->all());
        return redirect()->route('crecursos.access.candidate.index')->withFlashSuccess(trans('alerts.backend.Candidate.updated'));
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Candidate $Candidate, Request $request)
        {
            $this->Candidates->destroy($Candidate);
      return redirect()->back()->withFlashSuccess(trans('alerts.backend.Candidate.deleted'));
        }

        
}
