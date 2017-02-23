<?php

namespace App\Models\Crecursos\Access\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Crecursos\Access\HumanResources\Traits\Attribute\HumanResourcesAttribute;


/**
 * Class Contract
 * @packa App\Models\Access\Contract
 */
class HumanResources extends Model
{
    use SoftDeletes;
    use HumanResourcesAttribute;
    /**
     * The database table used by the model.
     *
     * @var strin     */
    protected $table;
    
    /**
     * The attributes that are mass assiable.
     *
     * @var array
     */
    protected $fillable = ['date','department','applicant_name','cargo','reason', 'vacant_name','department_a','manager','position','phone','email',
                    'genre','civil_state','level_education','career','quantity','department2','state_id','city','schedule','working_days','position2','lenguages','basic_salary','overall_salary','age_range','description',
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
        $this->table = config('access.humanresources_table');
    }

    public static function municipality($id){
        return Municipality::where('state_id','=',$id)->get();
    }
    
}
