<?php

namespace App\Models\Crecursos\Access\Estimated\Traits\Relationship;

/**
* Class EstimatedRelationship
* @package App\Models\Access\Estimated\Traits\Relationship
*/
trait EstimatedRelationship
{
  /**
   * @return mixed
   */
  public function month()
  {
    return $this->belongsTo(config('accessRH.month'), 'month_id');
  }

  public function concept()
  {
    return $this->belongsTo(config('accessRH.concept'), 'concept_id');
  }

}