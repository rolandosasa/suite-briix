<?php

namespace App\Events\Crecursos\Access\User;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeleted
 * @package App\Events\Crecursos\Access\User
 */
class UserDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $user
	 */
	public $user;

	/**
	 * @param $user
	 */
	public function __construct($user)
	{
		$this->user = $user;
	}
}