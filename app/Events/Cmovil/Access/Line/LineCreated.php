<?php

namespace App\Events\Cmovil\Access\Line;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterpriseCreated
 * @package App\Events\Cmovil\Access\Enterprise
 */
class LineCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $enterprise
	 */
	public $line;

	/**
	 * @param $enterprise
	 */
	public function __construct($line)
	{
		$this->line = $line;
	}
}