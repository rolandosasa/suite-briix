<?php

namespace App\Models\Crecursos\Access\Estimated;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Estimated\Traits\Relationship\EstimatedRelationship;

class Estimated extends Model
{
	use EstimatedRelationship;

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
  protected $fillable = ['time_programmed', 'time_difference', 'income', 'advance_percent', 'comment', 'concept_id', 'month_id'];

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
    $this->table = config('accessRH.estimateds_table');
  }
}
