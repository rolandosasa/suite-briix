<?php

namespace App\Models\Crecursos\Access\Municipality;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Municipality\Traits\MunicipalityAccess;
use App\Models\Crecursos\Access\Municipality\Traits\Attribute\MunicipalityAttribute;
use App\Models\Crecursos\Access\Municipality\Traits\Relationship\MunicipalityRelationship;
/**
 * Class State
 * @package App\Models\Access\Municipality
 */
class Municipality extends Model
{
    use MunicipalityAccess, MunicipalityAttribute, MunicipalityRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['state_id','namemunicipality'];

    protected $connection = 'cRecursos';
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.municipalities_table');
    }
}