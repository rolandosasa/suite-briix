<?php

namespace App\Models\Crecursos\Access\Concept\Traits\Relationship;

/**
* Class EnterpriseRelationship
* @package App\Models\Access\Concept\Traits\Relationship
*/
trait ConceptRelationship
{
  /**
   * @return mixed
   */

  public function personal()
	{
		return $this->belongsTo(config('accessRH.personal'), 'personal_id');
	}

  public function project()
  {
    return $this->belongsTo(config('accessRH.project'), 'project_id');
  }

  public function estimateds()
  {
    return $this->HasMany(config('accessRH.estimated'));
  }
}