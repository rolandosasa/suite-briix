<?php

namespace App\Http\Controllers\Crecursos\Access\Concept;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Crecursos\Access\Concept\Concept;
use App\Models\Crecursos\Access\Project\Project;
use App\Repositories\Crecursos\Access\Month\MonthRepositoryContract;

class ConceptController extends Controller
{
  protected $months; 

  public function __construct(MonthRepositoryContract $months)
  {
    $this->months = $months;        
  }


  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
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

  public function conceptsplan(Project $project)
  {

    $concepts = $project->concepts()->get();

    $months = array('Enero'       => 'Enero', 
                    'Febrero'     => 'Febrero',
                    'Marzo'       => 'Marzo',
                    'Abril'       => 'Abril',  
                    'Mayo'        => 'Mayo',
                    'Junio'       => 'Junio',  
                    'Julio'       => 'Julio', 
                    'Agosto'      => 'Agosto',   
                    'Septiembre'  => 'Septiembre', 
                    'Octubre'     => 'Octubre',
                    'Noviembre'   => 'Noviembre',
                    'Diciembre'   => 'Diciembre');

    return view('crecursos.access.concept.index')
      ->withConcepts($concepts)
      ->withMonths($months);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Concept $concept, Request $request)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
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
}
