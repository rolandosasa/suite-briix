<?php

namespace App\Models\Crecursos\Access\Municipality\Traits\Relationship;

/**
 * Class MunicipalityRelationship
 * @package App\Models\Access\Municipality\Traits\Relationship
 */
trait MunicipalityRelationship
{
    
    /**
     * @return mixed
     */
    public function states()
    {
        return $this->belongsTo(config('access.state'), 'state_id');
    }

}