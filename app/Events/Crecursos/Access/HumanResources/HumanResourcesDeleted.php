<?php

namespace App\Events\Crecursos\Access\HumanResources;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class HumanResourcesDeleted
 * @package App\Events\Crecursos\Access\HumanResources
 */
class HumanResourcesDeleted extends Event
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