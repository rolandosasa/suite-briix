<?php

namespace App\Events\Crecursos\Access\Requirements;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RequirementsCreated
 * @package App\Events\Crecursos\Access\Requirements
 */
class RequirementsCreated extends Event
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