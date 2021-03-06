<?php

namespace App\Events\Crecursos\Access\Role;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted
 * @package App\Events\Crecursos\Access\Role
 */
class RoleDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $role
	 */
	public $role;

	/**
	 * @param $role
	 */
	public function __construct($role)
	{
		$this->role = $role;
	}
}