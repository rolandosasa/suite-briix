<?php

namespace App\Events\Briix\Access\Enterprise;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterprisePermanentlyDeleted
 * @package App\Events\Briix\Access\Enterprise
 */
class EnterprisePermanentlyDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $enterprise
	 */
	public $enterprise;

	/**
	 * @param $enterpise
	 */
	public function __construct($enterprise)
	{
		$this->enterprise = $enterprise;
	}
}