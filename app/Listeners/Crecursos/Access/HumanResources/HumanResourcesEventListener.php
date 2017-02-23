<?php

namespace App\Listeners\Crecursos\Access\HumanResources;

/**
 * Class HumanResourcesEventListener
 * @package App\Listeners\Crecursos\Access\HumanResources
 */
class HumanResourcesEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'HumanResources';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.HumanResources.created") <strong>'.$event->HumanResources->name.'</strong>',
			$event->HumanResources->id,
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
			'trans("history.crecursos.HumanResources.updated") <strong>'.$event->HumanResources->name.'</strong>',
			$event->HumanResources->id,
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
			'trans("history.crecursos.HumanResources.deleted") <strong>'.$event->HumanResources->name.'</strong>',
			$event->HumanResources->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.HumanResources.restored") <strong>'.$event->HumanResources->name.'</strong>',
			$event->HumanResources->id,
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
			'trans("history.crecursos.HumanResources.permanently_deleted") <strong>'.$event->HumanResources->name.'</strong>',
			$event->HumanResources->id,
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
			\App\Events\Crecursos\Access\HumanResources\HumanResourcesCreated::class,
			'App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\HumanResources\HumanResourcesUpdated::class,
			'App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\HumanResources\HumanResourcesDeleted::class,
			'App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\HumanResources\HumanResourcesRestored::class,
			'App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Crecursos\Access\HumanResources\HumanResourcesPermanentlyDeleted::class,
			'App\Listeners\Crecursos\Access\HumanResources\HumanResourcesEventListener@onPermanentlyDeleted'
		);

	}
}