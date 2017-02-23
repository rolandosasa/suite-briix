<?php

namespace App\Events\Briix\Access\Enterprise;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterpriseDeleted
 * @package App\Events\Briix\Access\Enterprise
 */
class EnterpriseDeleted extends Event
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