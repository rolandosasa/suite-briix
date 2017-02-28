<?php

namespace App\Models\Cmovil\Access\Line\Traits\Relationship;

/**
 * Class EnterpriseRelationship
 * @package App\Models\Cmovil\Access\Enterprise\Traits\Relationship
 */
trait LineRelationship
{
    /**
     * Relación Lineas - Usuario. 1-N.
     * 
     * @return mixed
     */
    public function users()
    {
    //return $this->hasMany(config('auth.providers.cmusers.model'), 'user_id');
    return $this->hasMany(config('auth.providers.users.model'), 'user_id');
    }

    public function enterprises()
    {
    return $this->belongsTo(config('access.enterprise'), 'enterprise_id');

	}
}