<?php

namespace App\Models\Crecursos\Access\Candidate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Crecursos\Access\Candidate\Traits\Attribute\CandidateAttribute;

class Candidate extends Model
{
    //
    use SoftDeletes, CandidateAttribute;

   protected $table;
    
    /**
     * The attributes that are mass assiable.
     *
     * @var array
     */
    protected $fillable = [
                    'namecan','laveleducation','school','career','identitycard', 'curp' ,'rfccandidate','phonecel' ,'phonehome','genrecandidate', 'civilstatecandidate', 'birthday','egacandidate','imss','state','citycandidate','colony', 'address','statuscandidate','email', 'applyfor','category','compettition', 'levelReq','applyfortwo','categorytwo','compettitiontwo', 'levelReqtwo', 'socialnetwork','linkp','enterprises','activity','antiquity','reference','reasonofexit','validation'
                            ];

    protected $connection = 'cRecursos';
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.Candidate_table');
    }
}
