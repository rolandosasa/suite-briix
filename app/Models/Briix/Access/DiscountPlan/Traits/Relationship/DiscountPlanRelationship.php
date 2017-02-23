<?php

namespace App\Models\Briix\Access\DiscountPlan\Traits\Relationship;

/**
 * Class DiscountPlanRelationship
 * @package App\Models\Briix\Access\DiscountPlan\Traits\Relationship
 */
trait DiscountPlanRelationship
{
    /**
     * Relación Usuario - Empresa. 1-N.
     * 
     * @return mixed
     */

    public function users()
    {
        return $this->hasMany(config('auth.providers.users.model'), 'user_id');
    }

    public function contracts()
    {
        return $this->hasMany(config('access.contract'), 'rate_plan_id');
    }
}