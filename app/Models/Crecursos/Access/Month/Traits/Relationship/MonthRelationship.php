<?php

namespace App\Models\Crecursos\Access\Month\Traits\Relationship;

/**
* Class MonthRelationship
* @package App\Models\Access\Month\Traits\Relationship
*/
trait MonthRelationship
{
  /**
   * @return mixed
   */
   
  public function estimateds()
	{
		return $this->HasMany(config('accessRH.estimated'));
	}
}