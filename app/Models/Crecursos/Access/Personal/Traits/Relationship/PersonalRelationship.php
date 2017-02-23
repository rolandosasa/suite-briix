<?php

namespace App\Models\Crecursos\Access\Personal\Traits\Relationship;

/**
* Class EnterpriseRelationship
* @package App\Models\Access\Personal\Traits\Relationship
*/
trait PersonalRelationship
{
  /**
   * @return mixed
   */

  public function concept()
	{
		return $this->hasOne(config('accessRH.concept'));
	}

}