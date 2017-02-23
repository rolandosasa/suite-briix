<?php

namespace App\Events\Briix\Access\RatePlan;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RatePlanPermanentlyDeleted
 * @package App\Events\Briix\Access\RatePlan
 */
class RatePlanPermanentlyDeleted extends Event
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