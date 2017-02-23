<?php

namespace App\Events\Briix\Access\RatePlan;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RatePlanCreated
 * @package App\Events\Briix\Access\RatePlan
 */
class RatePlanCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $RatePlan
	 */
	public $ratePlan;

	/**
	 * @param $RatePlan
	 */
	public function __construct($ratePlan)
	{
		$this->ratePlan = $ratePlan;
	}
}