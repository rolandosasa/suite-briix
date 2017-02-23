<?php

namespace App\Models\Crecursos\Access\State;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\State\Traits\StateAccess;
use App\Models\Crecursos\Access\State\Traits\Attribute\StateAttribute;
use App\Models\Crecursos\Access\State\Traits\Relationship\StateRelationship;
/**
 * Class State
 * @package App\Models\Access\State
 */
class State extends Model
{

    // use StateAccess, StateAttribute, StateRelationship;
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
    protected $fillable = ['namestate'];

    protected $connection = 'cRecursos';
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.states_table');
    }
}