<?php

namespace App\Listeners\Briix\Access\RatePlan;

/**
 * Class RatePlanEventListener
 * @package App\Listeners\Briix\Access\RatePlan
 */
class RatePlanEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'RatePlan';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.rateplans.created") <strong>'.$event->ratePlan->description.'</strong>',
			$event->ratePlan->id,
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
			'trans("history.briix.rateplans.updated") <strong>'.$event->ratePlan->description.'</strong>',
			$event->ratePlan->id,
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
			'trans("history.briix.rateplans.deleted") <strong>'.$event->ratePlan->description.'</strong>',
			$event->ratePlan->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.rateplans.restored") <strong>'.$event->ratePlan->description.'</strong>',
			$event->ratePlan->id,
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
			'trans("history.briix.rateplans.permanently_deleted") <strong>'.$event->ratePlan->description.'</strong>',
			$event->ratePlan->id,
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
			\App\Events\Briix\Access\RatePlan\RatePlanCreated::class,
			'App\Listeners\Briix\Access\RatePlan\RatePlanEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\RatePlan\RatePlanUpdated::class,
			'App\Listeners\Briix\Access\RatePlan\RatePlanEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\RatePlan\RatePlanDeleted::class,
			'App\Listeners\Briix\Access\RatePlan\RatePlanEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\RatePlan\RatePlanRestored::class,
			'App\Listeners\Briix\Access\RatePlan\RatePlanEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Briix\Access\RatePlan\RatePlanPermanentlyDeleted::class,
			'App\Listeners\Briix\Access\RatePlan\RatePlanEventListener@onPermanentlyDeleted'
		);

	}
}