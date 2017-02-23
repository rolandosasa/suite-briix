<?php

namespace App\Models\Crecursos\Access\State\Traits\Relationship;

/**
 * Class StateRelationship
 * @package App\Models\Access\State\Traits\Relationship
 */
trait StateRelationship
{
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->HasMany(config('auth.providers.users.model'), 'state_id');
    }

    /**
     * @return mixed
     */
    public function municipalities()
    {
        return $this->HasMany(config('access.municipalitie'), 'state_id');
    }

    
}