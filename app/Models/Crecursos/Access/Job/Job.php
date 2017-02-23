<?php

namespace App\Models\Crecursos\Access\Job;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Crecursos\Access\Job\Traits\Attribute\JobAttribute;

class Job extends Model
{
    use SoftDeletes, JobAttribute;

   protected $table;
    
    /**
     * The attributes that are mass assiable.
     *
     * @var array
     */
    protected $fillable = [
                    'name_jobs',
                             'department',
                             'job_description',
                             'immediate_boss',
                             'supervises',
                             'responsabilities',
                             'salary_basic',
                             'salary_global'
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
        $this->table = config('access.Job_table');
    }
}
