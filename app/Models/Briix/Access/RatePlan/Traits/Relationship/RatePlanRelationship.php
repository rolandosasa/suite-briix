<?php

namespace App\Models\Briix\Access\RatePlan\Traits\Relationship;

/**
 * Class RatePlanRelationship
 * @package App\Models\Briix\Access\RatePlan\Traits\Relationship
 */
trait RatePlanRelationship
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