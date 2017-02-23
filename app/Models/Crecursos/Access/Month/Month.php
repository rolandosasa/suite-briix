<?php

namespace App\Models\Crecursos\Access\Month;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Month\Traits\Relationship\MonthRelationship;

class Month extends Model
{
  use MonthRelationship;

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
  protected $fillable = ['month'];

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
    $this->table = config('accessRH.months_table');
  }
}
