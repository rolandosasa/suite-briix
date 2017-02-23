<?php

namespace App\Models\Crecursos\Access\Personal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Crecursos\Access\Personal\Traits\Relationship\PersonalRelationship;
use App\Models\Crecursos\Access\Personal\Traits\Attribute\PersonalAttribute;

class Personal extends Model
{

  use SoftDeletes, PersonalRelationship, PersonalAttribute;

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
  protected $fillable = ['name', 'firstlastname', 'secondlastname', 'gender', 'birthdate', 'age',
  'civil_status', 'birthplace', 'address', 'email', 'phone', 'photo', 'curp', 'imss', 'rfc', 'level_studies', 'school','career','identity_card'];
  

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
    $this->table = config('accessRH.personals_table');
  }
}
