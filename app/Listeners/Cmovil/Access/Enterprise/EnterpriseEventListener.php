<?php

namespace App\Listeners\Cmovil\Access\Enterprise;

/**
 * Class EnterpriseEventListener
 * @package App\Listeners\Cmovil\Access\Enterprise
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
			'trans("history.cmovil.enterprises.created") <strong>'.$event->enterprise->name.'</strong>',
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
			'trans("history.cmovil.enterprises.updated") <strong>'.$event->enterprise->name.'</strong>',
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
			'trans("history.cmovil.enterprises.deleted") <strong>'.$event->enterprise->name.'</strong>',
			$event->enterprise->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.enterprises.restored") <strong>'.$event->enterprise->name.'</strong>',
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
			'trans("history.cmovil.enterprises.permanently_deleted") <strong>'.$event->enterprise->name.'</strong>',
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
			\App\Events\Cmovil\Access\Enterprise\EnterpriseCreated::class,
			'App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Enterprise\EnterpriseUpdated::class,
			'App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Enterprise\EnterpriseDeleted::class,
			'App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Enterprise\EnterpriseRestored::class,
			'App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Enterprise\EnterprisePermanentlyDeleted::class,
			'App\Listeners\Cmovil\Access\Enterprise\EnterpriseEventListener@onPermanentlyDeleted'
		);

	}
}