<?php

namespace App\Events\Crecursos\Access\Requirements;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RequirementsDeleted
 * @package App\Events\Crecursos\Access\Requirements
 */
class RequirementsDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $Requirements
	 */
	public $Requirements;

	/**
	 * @param $Requirements
	 */
	public function __construct($Requirements)
	{
		$this->Requirements = $Requirements;
	}
}