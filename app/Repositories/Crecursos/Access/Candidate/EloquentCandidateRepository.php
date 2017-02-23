<?php

namespace App\Repositories\Crecursos\Access\Candidate;

use App\Models\Crecursos\Access\Candidate\Candidate;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Crecursos\Access\Candidate\CandidateCreated;
use App\Events\Crecursos\Access\Candidate\CandidateDeleted;
use App\Events\Crecursos\Access\Candidate\CandidateUpdated;
use App\Events\Crecursos\Access\Candidate\CandidateRestored;
use App\Events\Crecursos\Access\Candidate\CandidatePermanentlyDeleted;

/**
 * Class EloquentCandidateRepository
 * @package app\Repositories\Candidate
 */
class EloquentCandidateRepository implements CandidateRepositoryContract
{
    /** 
     * @return mixed
     */
    public function getCount() {
        return Candidate::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable($trashed = false) {
         if ($trashed == "true") {
            return Candidate::onlyTrashed()
                ->select([ 'id','namecan','laveleducation','school','career','identitycard', 'curp' ,'rfccandidate','phonecel' ,'phonehome','genrecandidate', 'civilstatecandidate', 'birthday','egacandidate','imss','state','citycandidate', 'colony', 'address','statuscandidate','email', 'applyfor','category','compettition', 'levelReq','applyfortwo','categorytwo','compettitiontwo', 'levelReqtwo', 'socialnetwork','linkp','enterprises','activity','antiquity','reference','reasonofexit', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }
        
        return Candidate::select(['id','namecan','laveleducation','school','career','identitycard', 'curp' ,'rfccandidate','phonecel' ,'phonehome','genrecandidate', 'civilstatecandidate', 'birthday','egacandidate','imss','state','citycandidate','colony', 'address','statuscandidate', 'email','applyfor','category','compettition', 'levelReq','applyfortwo','categorytwo','compettitiontwo', 'levelReqtwo', 'socialnetwork','linkp','enterprises','activity','antiquity','reference','reasonofexit' , 'created_at', 'updated_at', 'deleted_at' ])
            ->get();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllCandidate($order_by = 'id')
    {
      
        return Candidate::all();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
         $Candidate = $this->createCandidateStub($input);
        DB::transaction(function() use ($Candidate) {
            if ($Candidate->save()) {
                event(new CandidateCreated($Candidate));
                return true;
            }

            throw new GeneralException(trans('exceptions.Crecursos.access.Candidate.create_error'));
        });
    }

    /**
     * @param  Candidate 
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Candidate $Candidate, $input)
    {
       DB::transaction(function() use ($Candidate, $input) {
      if ($Candidate->update($input)) {
        //For whatever reason this just wont work in the above call, so a second is needed for now
        $Candidate->save();
      }
    });    
    }

    /**
     * @param Candidate
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Candidate $Candidate)
    {
      return $Candidate->delete();
    }

    private function createCandidateStub($input)
     {
         
        $Candidate = new Candidate;
        $Candidate->namecan = $input['namecan'];
        $Candidate->laveleducation = $input['laveleducation'];
        $Candidate->school = $input['school'];
        $Candidate->career = $input['career'];
        $Candidate->identitycard = $input['identitycard']; 
        $Candidate->curp = $input['curp'];
        $Candidate->rfccandidate = $input['rfccandidate'];
        $Candidate->phonecel = $input['phonecel'];
        $Candidate->phonehome = $input['phonehome'];
        $Candidate->genrecandidate = $input['genrecandidate'];
        $Candidate->civilstatecandidate = $input['civilstatecandidate'];
        $Candidate->birthday = $input['birthday'];
        $Candidate->egacandidate = $input['egacandidate'];
        $Candidate->imss = $input['imss'];
        $Candidate->state = $input['state'];
        $Candidate->citycandidate = $input['citycandidate'];
        $Candidate->colony = $input['colony'];
        $Candidate->address = $input['address'];
        $Candidate->email = $input['email'];
        $Candidate->statuscandidate = $input['statuscandidate'];
        $Candidate->applyfor = $input['applyfor'];
        $Candidate->category = $input['category'];
        $Candidate->compettition = $input['compettition'];
        $Candidate->levelReq = $input['levelReq'];
        $Candidate->applyfortwo = $input['applyfortwo'];
        $Candidate->categorytwo = $input['categorytwo'];
        $Candidate->compettitiontwo = $input['compettitiontwo'];
        $Candidate->levelReqtwo = $input['levelReqtwo'];
        $Candidate->socialnetwork = $input['socialnetwork'];
        $Candidate->linkp = $input['linkp'];
        $Candidate->enterprises = $input['enterprises'];
        $Candidate->activity = $input['activity'];
        $Candidate->antiquity = $input['antiquity'];
        $Candidate->reference = $input['reference'];
        $Candidate->reasonofexit = $input['reasonofexit'];
        $Candidate->save();
        return $Candidate;
        // dd($Candidate);


    }
}