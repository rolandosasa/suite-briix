<?php

namespace App\Events\Crecursos\Access\Role;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated
 * @package App\Events\Crecursos\Access\Role
 */
class RoleCreated extends Event
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