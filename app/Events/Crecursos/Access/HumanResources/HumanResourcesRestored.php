<?php

namespace App\Events\Crecursos\Access\HumanResources;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class HumanResourcesRestored
 * @package App\Events\Crecursos\Access\HumanResources
 */
class HumanResourcesRestored extends Event
{
	use SerializesModels;

	/**
	 * @var $HumanResources
	 */
	public $HumanResources;

	/**
	 * @param $HumanResources
	 */
	public function __construct($HumanResources)
	{
		$this->HumanResources = $HumanResources;
	}
}