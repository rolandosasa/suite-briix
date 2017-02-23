<?php

namespace App\Models\Crecursos\Access\Project\Traits\Relationship;

/**
* Class ProjectRelationship
* @package App\Models\Access\Project\Traits\Relationship
*/
trait ProjectRelationship
{
  /**
   * @return mixed
   */
   
  public function concepts()
	{
		return $this->HasMany(config('accessRH.concept'));
	}
}