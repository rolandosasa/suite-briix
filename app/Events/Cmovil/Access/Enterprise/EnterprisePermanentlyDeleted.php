<?php

namespace App\Events\Cmovil\Access\Enterprise;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterprisePermanentlyDeleted
 * @package App\Events\Cmovil\Access\Enterprise
 */
class EnterprisePermanentlyDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $enterprise
	 */
	public $enterprise;

	/**
	 * @param $enterprise
	 */
	public function __construct($enterprise)
	{
		$this->enterprise = $enterprise;
	}
}