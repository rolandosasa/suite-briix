<?php

namespace App\Models\Briix\Access\DiscountPlan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Briix\Access\DiscountPlan\Traits\DiscountPlanAccess;
use App\Models\Briix\Access\DiscountPlan\Traits\Attribute\DiscountPlanAttribute;
use App\Models\Briix\Access\DiscountPlan\Traits\Relationship\DiscountPlanRelationship;

/**
 * Class DiscountPlan
 * @package App\Models\Briix\Access\DiscountPlan
 */
class DiscountPlan extends Model
{
    use SoftDeletes, DiscountPlanAccess, DiscountPlanAttribute, DiscountPlanRelationship;

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
    protected $fillable = ['product','rankStartMonth','rankEndMonth','rankStartUser','rankEndUser','status','discount'];

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
        $this->table = config('access.discount_plans_table');
    }
}
