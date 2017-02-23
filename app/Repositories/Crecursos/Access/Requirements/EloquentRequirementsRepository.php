<?php

namespace App\Repositories\Crecursos\Access\Requirements;

use App\Models\Crecursos\Access\Requirements\Requirements;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Crecursos\Access\Requirements\RequirementsCreated;
use App\Events\Crecursos\Access\Requirements\RequirementsDeleted;
use App\Events\Crecursos\Access\Requirements\RequirementsUpdated;
use App\Events\Crecursos\Access\Requirements\RequirementsRestored;
use App\Events\Crecursos\Access\Requirements\RequirementsPermanentlyDeleted;
/**
 * Class EloquentRequirementsRepository
 * @package app\Repositories\Requirements
 */
class EloquentRequirementsRepository implements RequirementsRepositoryContract
{
    
    /**
     * @return mixed
     */
    public function getCount() {
        return Requirements::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false) {

        if ($trashed == "true") {
            return Requirements::onlyTrashed()
                ->select([ 'id','requestv','nivelreq','created_at', 'updated_at', 'deleted_at'])
                ->get();
        }
        // 
         return Requirements::select([
            'requirements.id',
            
            'requirements.requestv',
            'requirements.nivelreq',
            'requirements.created_at',
            'requirements.updated_at',
            'requirements.deleted_at' ])
            ->get();
    }
    
    public function getAllRequirements($order_by = 'id')
    {
      
        return Requirements::all();
    }

    
    public function create($requestv,$nivelreq)
    {
        return  $this->createRequirementsStub($requestv,$nivelreq);
    }

    public function update(Requirements $Requirements, $input)
    {
        
    }

    /**
     * @param Requirements
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Requirements $Requirements)
    {
      
    }

    private function createRequirementsStub($requestv,$nivelreq)
    {
        $Requirements             = new Requirements;
        
        $Requirements->requestv       = $input['requestv'];
        $Requirements->nivelreq = $input['nivelreq'];
        
        $Requirements->save();
        return $Requirements;
    }
}
 