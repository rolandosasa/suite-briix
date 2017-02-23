<?php

namespace App\Models\Briix\Access\RatePlan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Briix\Access\RatePlan\Traits\RatePlanAccess;
use App\Models\Briix\Access\RatePlan\Traits\Attribute\RatePlanAttribute;
use App\Models\Briix\Access\RatePlan\Traits\Relationship\RatePlanRelationship;

/**
 * Class Role
 * @package App\Models\Briix\Access\RatePlan
 */
class RatePlan extends Model
{
    use SoftDeletes, RatePlanAccess, RatePlanAttribute, RatePlanRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    protected $connection = 'briix';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'product','cost'];

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
        $this->table = config('access.rate_plans_table');
    }
}
