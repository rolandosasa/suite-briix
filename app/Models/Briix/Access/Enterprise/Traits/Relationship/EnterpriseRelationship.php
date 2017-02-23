<?php

namespace App\Models\Briix\Access\Enterprise\Traits\Relationship;

/**
 * Class EnterpriseRelationship
 * @package App\Models\Briix\Access\Enterprise\Traits\Relationship
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
        return $this->hasMany(config('auth.providers.users.model'), 'user_id');
    }


    public function contracts()
    {
        return $this->hasMany(config('access.contract'), 'enterprise_id');
    }


}