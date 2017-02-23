<?php

namespace App\Events\Briix\Access\RatePlan;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RatePlanRestored
 * @package App\Events\Briix\Access\RatePlan
 */
class RatePlanRestored extends Event
{
	use SerializesModels;

	/**
	 * @var $ratePlan
	 */
	public $ratePlan;

	/**
	 * @param $ratePlan
	 */
	public function __construct($ratePlan)
	{
		$this->ratePlan = $ratePlan;
	}
}