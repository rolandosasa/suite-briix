<?php

namespace App\Listeners\Briix\Access\DiscountPlan;

/**
 * Class DiscountPlanEventListener
 * @package App\Listeners\Briix\Access\DiscountPlan
 */
class DiscountPlanEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'DiscountPlan';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.discountplans.created") <strong>'.$event->discountPlan->product.'</strong>',
			$event->discountPlan->id,
			'plus',
			'bg-green'
		);
	}

	/**
	 * @param $event
	 */
	public function onUpdated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.discountplans.updated") <strong>'.$event->discountPlan->product.'</strong>',
			$event->discountPlan->id,
			'save',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.discountplans.deleted") <strong>'.$event->discountPlan->product.'</strong>',
			$event->discountPlan->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.discountplans.restored") <strong>'.$event->discountPlan->product.'</strong>',
			$event->discountPlan->id,
			'refresh',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onPermanentlyDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.discountplans.permanently_deleted") <strong>'.$event->discountPlan->product.'</strong>',
			$event->discountPlan->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			\App\Events\Briix\Access\DiscountPlan\DiscountPlanCreated::class,
			'App\Listeners\Briix\Access\DiscountPlan\DiscountPlanEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\DiscountPlan\DiscountPlanUpdated::class,
			'App\Listeners\Briix\Access\DiscountPlan\DiscountPlanEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\DiscountPlan\DiscountPlanDeleted::class,
			'App\Listeners\Briix\Access\DiscountPlan\DiscountPlanEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\DiscountPlan\DiscountPlanRestored::class,
			'App\Listeners\Briix\Access\DiscountPlan\DiscountPlanEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Briix\Access\DiscountPlan\DsicountPlanPermanentlyDeleted::class,
			'App\Listeners\Briix\Access\DiscountPlan\DiscountPlanEventListener@onPermanentlyDeleted'
		);

	}
}