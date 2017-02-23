<?php

namespace App\Models\Crecursos\Access\Requirements;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirements extends Model
{
    protected $table;
    
    /**
     * The attributes that are mass assiable.
     *
     * @var array
     */
    protected $fillable = [
                
                    'requestv',
                    'nivelreq',
                    
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
        $this->table = config('access.requirements_table');
    }
}
