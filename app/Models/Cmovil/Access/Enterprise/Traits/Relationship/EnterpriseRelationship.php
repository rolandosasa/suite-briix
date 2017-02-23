<?php

namespace App\Models\Cmovil\Access\Enterprise\Traits\Relationship;

/**
 * Class EnterpriseRelationship
 * @package App\Models\Cmovil\Access\Enterprise\Traits\Relationship
 */
trait EnterpriseRelationship
{
    /**
     * Relación Usuario - Empresa. 1-N.
     * 
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany(config('auth.providers.cmusers.model'), 'user_id');
    }


    public function contracts()
    {
        return $this->hasMany(config('accessCM.contract'), 'enterprise_id');
    }


}