<?php

namespace App\Models\Crecursos\Access\Compettition;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Crecursos\Access\Compettition\Traits\Attribute\CompettitionAttribute;

class Compettition extends Model
{
    use SoftDeletes, CompettitionAttribute;

   protected $table;
    
    /**
     * The attributes that are mass assiable.
     *
     * @var array
     */
    protected $fillable = [
                    'category',
                             'name',
                             'type'
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
        $this->table = config('access.Compettition_table');
    }
}
