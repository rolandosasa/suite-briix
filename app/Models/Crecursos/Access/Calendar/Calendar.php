<?php

namespace App\Models\Crecursos\Access\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Calendar extends Model
{
   use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var strin     */
    protected $table;

    protected $fillable = ['title', 'start', 'end', 'color'];

    protected $connection = 'cRecursos';
    
    protected $hidden = ['id'];

    /**
     * @var array
     */
    

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.calendar_table');
    }
    
}
