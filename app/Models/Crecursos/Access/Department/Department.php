<?php

namespace App\Models\Crecursos\Access\Department;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Department\Traits\Attribute\DepartmentAttribute;
use App\Models\Crecursos\Access\Department\Traits\Relationship\DepartmentRelationship;

class Department extends Model
{
  use DepartmentAttribute, DepartmentRelationship;

  protected $table;
  
  protected $connection = 'cRecursos';
  
  /**
   * The attributes that are mass assiable.
   *
   * @var array
   */
  protected $fillable = ['id_department','name_department','area','description',];

  /**
   * @var array
   */
  protected $dates = ['deleted_at'];


  /**
   * @param array $attributes
   */
  public function __construct(array $attributes = [])
  {
      parent::__construct($attributes);
      $this->table = config('accessRH.departments_table');
  }
}
