<?php

namespace App\Http\Controllers\Backend\Access\Requirements;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Crecursos\Access\Requirements\RequirementsRepositoryContract;
use App\Models\Crecursos\Access\Requirements\Requirements;

class RequirementsController extends Controller
{
     protected $Requirements; 

   
    public function __construct(RequirementsRepositoryContract $Requirements)
	{
        $this->Requirements = $Requirements;        
    }
	
    public function get(Request $request)
	{
		return Datatables::of($this->Requirements->getForDataTable($request->get('trashed')))
        ->addColumn('actions', function($Requirements) {
                return $Requirements->action_buttons;
            })
			->make(true);
	}

    public function create()
    {

        return view('backend.access.HumanResources.Requirements.create');
    }

    public function store(Request $request)
    {
        $this->Requirements->create($request->all());
        
    }
    
}
