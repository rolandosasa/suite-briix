<?php

namespace App\Listeners\Briix\Access\Plan;

/**
 * Class PlanEventListener
 * @package App\Listeners\Briix\Access\Plan
 */
class PlanEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Plan';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.plans.created") <strong>'.$event->plan->name.'</strong>',
			$event->plan->id,
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
			'trans("history.briix.plans.updated") <strong>'.$event->plan->name.'</strong>',
			$event->plan->id,
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
			'trans("history.briix.plans.deleted") <strong>'.$event->plan->name.'</strong>',
			$event->plan->id,
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
			\App\Events\Briix\Access\Plan\PlanCreated::class,
			'App\Listeners\Briix\Access\Plan\PlanEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\Plan\PlanUpdated::class,
			'App\Listeners\Briix\Access\Plan\PlanEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\Plan\PlanDeleted::class,
			'App\Listeners\Briix\Access\Plan\PlanEventListener@onDeleted'
		);
	}
}