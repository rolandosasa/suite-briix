<?php

namespace App\Repositories\Crecursos\Access\HumanResources;

use App\Models\Crecursos\Access\HumanResources\HumanResources;
use App\Models\Crecursos\Access\Requirements\requirements;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Crecursos\Access\HumanResources\HumanResourcesCreated;
use App\Events\Crecursos\Access\HumanResources\HumanResourcesDeleted;
use App\Events\Crecursos\Access\HumanResources\HumanResourcesUpdated;
use App\Events\Crecursos\Access\HumanResources\HumanResourcesRestored;
use App\Events\Crecursos\Access\HumanResources\HumanResourcesPermanentlyDeleted;

/**
 * Class EloquentHumanResourcesRepository
 * @package app\Repositories\HumanResources
 */
class EloquentHumanResourcesRepository implements HumanResourcesRepositoryContract
{
    
    /**
     * @return mixed
     */
    public function getCount() {
        return HumanResources::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false) 
    {
        if ($trashed == "true") {
            return HumanResources::onlyTrashed()
                ->select([ 'id','date','department','applicant_name','cargo','reason', 'vacant_name','department_a','manager','position','phone','email',
                    'genre','civil_state','level_education','career','quantity','department2','state_id','city','schedule','working_days','position2','lenguages','basic_salary','overall_salary','age_range','description','created_at', 'updated_at', 'deleted_at'])
                ->get();
        }
        // 
         return HumanResources::select(['id','date',
                    'department',
                    'applicant_name',
                    'cargo',
                    'reason',
                    'vacant_name',
                    'department_a',
                    'manager',
                    'position',
                    'phone',
                    'email',
                    // Campos del candidato
                    'genre',
                    'civil_state',
                    'level_education',
                    'career',
                    // Campos de la vacante
                    'quantity',
                    'department2',
                    'state_id',
                    'city',
                    'schedule',
                    'working_days',
                    'position2',
                    'lenguages',
                    'basic_salary',
                    'overall_salary',
                    'age_range',
                    'description',
                    'created_at', 'updated_at', 'deleted_at' ])
            ->get();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllHumanResources($order_by = 'id')
    {
      
        return HumanResources::all();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
      // dd($input);
        $HumanResources = $this->createHumanResourceStub($input);
       
    }

    /**
     * @param  HumanResources 
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(HumanResources $HumanResources, $input)
    {
      DB::transaction(function() use ($HumanResources, $input) {
      if ($HumanResources->update($input)) {
        //For whatever reason this just wont work in the above call, so a second is needed for now
        $HumanResources->save();
      }
    });  
    }

    /**
     * @param HumanResources
     * @throws GeneralException
     * @return bool
     */
    public function destroy(HumanResources $HumanResources)
    {
      return $HumanResources->delete();
    }

    private function createHumanResourceStub($input)
    {
     $HumanResources             = new HumanResources;
        $HumanResources->date      = $input['date'];
        $HumanResources->department = $input['department'];
        $HumanResources->applicant_name = $input['applicant_name'];
        $HumanResources->cargo = $input['cargo'];
        $HumanResources->reason = $input['reason'];
        $HumanResources->vacant_name = $input['vacant_name'];
        $HumanResources->department_a = $input['department_a'];
        $HumanResources->manager = $input['manager'];
        $HumanResources->position = $input['position'];
        $HumanResources->phone = $input['phone'];
        $HumanResources->email = $input['email'];
        $HumanResources->genre = $input['genre'];
        $HumanResources->civil_state = $input['civil_state'];
        $HumanResources->level_education = $input['level_education'];
        $HumanResources->career = $input['career'];
        $HumanResources->quantity = $input['quantity'];
        $HumanResources->department2 = $input['department2'];
        $HumanResources->state_id = $input['state_id'];
        $HumanResources->city = $input['city'];
        $HumanResources->schedule = $input['schedule'];
        $HumanResources->working_days = $input['working_days'];
        $HumanResources->position2 = $input['position2'];
        $HumanResources->lenguages = $input['lenguages'];
        $HumanResources->basic_salary = $input['basic_salary'];
        $HumanResources->overall_salary = $input['overall_salary'];
        $HumanResources->age_range = $input['age_range'];
        $HumanResources->description = $input['description'];
        
        $HumanResources->save();
        return $HumanResources;   
    }
}
 