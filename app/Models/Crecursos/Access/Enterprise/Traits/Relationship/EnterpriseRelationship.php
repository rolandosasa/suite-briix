<?php

namespace App\Models\Crecursos\Access\Enterprise\Traits\Relationship;

/**
* Class EnterpriseRelationship
* @package App\Models\Access\Enterprise\Traits\Relationship
*/
trait EnterpriseRelationship
{
  /**
   * @return mixed
   */
  public function departments()
  {
    return $this->belongsToMany(config('accessRH.department'), config('accessRH.department_enterprise_table'), 'enterprise_id', 'department_id');
  }
}