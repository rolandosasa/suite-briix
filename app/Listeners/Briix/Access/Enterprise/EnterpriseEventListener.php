<?php

namespace App\Listeners\Briix\Access\Enterprise;

/**
 * Class EnterpriseEventListener
 * @package App\Listeners\Briix\Access\Enterprise
 */
class EnterpriseEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Enterprise';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.enterprises.created") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
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
			'trans("history.briix.enterprises.updated") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
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
			'trans("history.briix.enterprises.deleted") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.enterprises.restored") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
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
			'trans("history.briix.enterprises.permanently_deleted") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
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
			\App\Events\Briix\Access\Enterprise\EnterpriseCreated::class,
			'App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\Enterprise\EnterpriseUpdated::class,
			'App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\Enterprise\EnterpriseDeleted::class,
			'App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\Enterprise\EnterpriseRestored::class,
			'App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Briix\Access\Enterprise\EnterprisePermanentlyDeleted::class,
			'App\Listeners\Briix\Access\Enterprise\EnterpriseEventListener@onPermanentlyDeleted'
		);

	}
}