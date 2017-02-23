<?php

namespace App\Models\Crecursos\Access\Enterprise;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Enterprise\Traits\Attribute\EnterpriseAttribute;
use App\Models\Crecursos\Access\Enterprise\Traits\Relationship\EnterpriseRelationship;

class Enterprise extends Model
{
	use EnterpriseAttribute, EnterpriseRelationship;

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
	protected $fillable = ['name_enterprise','rfc', 'email', 'phone', 'addrress'];


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
			$this->table = config('accessRH.enterprises_table');
	}
}
