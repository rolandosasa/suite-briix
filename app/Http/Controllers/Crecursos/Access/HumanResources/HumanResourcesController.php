<?php

namespace App\Http\Controllers\Crecursos\Access\HumanResources;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Crecursos\Access\HumanResources\HumanResources;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Crecursos\Access\HumanResources\HumanResourcesRepositoryContract;
use App\Repositories\Crecursos\Access\Requirements\RequirementsRepositoryContract;
use App\Models\Crecursos\Access\Municipality\Municipality;
use App\Models\Crecursos\Access\State\State;
use App\Models\Crecursos\Access\Department\department;
use App\Models\Crecursos\Access\Requirements\requirements;
use Mail;
use App\Http\Requests\Crecursos\Access\HumanResources\StoreHumanResourcesRequest;
use App\Http\Requests\Crecursos\Access\HumanResources\UpdateHumanResourcesRequest;
use App\Http\Requests\Crecursos\Access\HumanResources\ManageHumanResourcesRequest;
class HumanResourcesController extends Controller
{
    //
    protected $humanresources; 

    // protected $Requirements;
   
    public function __construct(HumanResourcesRepositoryContract $humanresources)
	{
        $this->humanresources = $humanresources;  
            
    }

	/**
	 * @param ManageHumanRecuestRequest $request
	 * @return mixed
	 */
	public function index(ManageHumanResourcesRequest $request)
	{ 
        
        return view('crecursos.access.humanresources.index');
    }

     public function get(ManageHumanResourcesRequest $request)
    {
        return Datatables::of($this->humanresources->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($humanresources) {
                return $humanresources->action_buttons;
            })
            ->make(true);
    }

    public function create(ManageHumanResourcesRequest $request)
    {
        // dd($request);
        $State = State::lists('namestate', 'id');
        $Municipality = Municipality::lists('namemunicipality', 'id');
    	return view('crecursos.access.humanresources.create', compact('Municipality','State'));
    }

     public function import()
    {
        Excel::load('municipalities.csv', function($reader) {
            foreach ($reader->get() as $municipality) {
                Municipality::create([
                    'state_id' => $municipality->state_id,
                    'namemunicipality' => $municipality->namemunicipality,
                ]);
            }
        });
        return Municipality::all();
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->humanresources->create($request->all());
        $HumanResources = new HumanResources($request->all());
        // $email = $HumanResources->email;
        // $HumanResources = new HumanResources($request->all());
        // Mail::send('crecursos.access.HumanResources.emails.confirmacion',$request->all(), function($msj) use ($email){
        //     // dd($msj);
        //     $msj->subject('Vacante creada');
        //     $msj->to($email);
        //     // dd($msj);
        // });


        $total = count($request->requestv);

        if($request->requestv != null){
            for($i = 1; $i <= $total; $i++){
                $requirements = new Requirements;
                
                $requirements->requestv = $request->requestv[$i];
                $requirements->nivelreq = $request->nivelreq[$i];
                $requirements->save();
            }
        }
        return redirect()->route('crecursos.access.humanresources.index')->withFlashSuccess(trans('alerts.crecursos.HumanResources.created'));
    }
    
   
    public function edit(HumanResources $humanresources, ManageHumanResourcesRequest $request)
    {
        // dd($humanresources);
        $State = State::lists('namestate', 'id');
        $Municipality = Municipality::lists('namemunicipality', 'id');
        
        return view('crecursos.access.humanresources.edit', compact('State', 'Municipality'))->withHumanResources($humanresources);
    }
    public function update(HumanResources $humanresources, Request $request)
    {
        // dd($HumanResources);
        $this->humanresources->update($humanresources, $request->all());
        return redirect()->route('crecursos.access.humanresources.index')->withFlashSuccess(trans('alerts.crecursos.HumanResources.updated'));
    }

    public function destroy(HumanResources $humanresources, ManageHumanResourcesRequest $request)
        {
            $this->humanresources->destroy($humanresources);
      return redirect()->back()->withFlashSuccess(trans('alerts.crecursos.HumanResources.deleted'));
        }
    public function getMunicipality(Request $request)
        {
            if ($request->ajax()) {
                $Municipality = Municipality::municipality($id);
                return response()->json($Municipality);
            }

        }
    
}
