<?php

namespace App\Events\Briix\Access\DiscountPlan;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class DiscountPlanPermanentlyDeleted
 * @package App\Events\Briix\Access\DiscountPlan
 */
class DiscountPlanPermanentlyDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $discountPlan
	 */
	public $discountPlan;

	/**
	 * @param $discountPlan
	 */
	public function __construct($discountPlan)
	{
		$this->discountPlan = $discountPlan;
	}
}

