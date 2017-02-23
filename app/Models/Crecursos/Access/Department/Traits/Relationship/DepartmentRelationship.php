<?php

namespace App\Models\Crecursos\Access\Department\Traits\Relationship;

/**
* Class DeprtmentRelationship
* @package App\Models\Access\Department\Traits\Relationship
*/
trait DepartmentRelationship
{
  /**
   * @return mixed
   */
  public function enterprises()
  {
    return $this->belongsToMany(config('accessRH.enterprise'), config('accessRH.department_enterprise_table'), 'department_id', 'enterprise_id');
  }
}