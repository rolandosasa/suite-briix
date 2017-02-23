<?php

namespace App\Models\Crecursos\Access\Concept;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Concept\Traits\Relationship\ConceptRelationship;

class Concept extends Model
{
  use ConceptRelationship;

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
  protected $fillable = ['name_concept', 'time_total', 'personal_id', 'project_id'];

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
    $this->table = config('accessRH.concepts_table');
  }
}
