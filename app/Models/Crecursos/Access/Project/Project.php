<?php

namespace App\Models\Crecursos\Access\Project;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Project\Traits\Attribute\ProjectAttribute;
use App\Models\Crecursos\Access\Project\Traits\Relationship\ProjectRelationship;

class Project extends Model
{
	use ProjectAttribute, ProjectRelationship;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table;

  protected $connection = 'cRecursos';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name_project', 'description', 'contractor', 'date_init', 'date_end', 'advance', 'total_amount'];

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
    $this->table = config('accessRH.projects_table');
  }
}
