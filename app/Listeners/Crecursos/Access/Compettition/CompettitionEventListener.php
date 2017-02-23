<?php

namespace App\Listeners\Crecursos\Access\Compettition;

/**
 * Class CompettitionEventListener
 * @package App\Listeners\Crecursos\Access\Compettition
 */
class CompettitionEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Compettition';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Compettition.created") <strong>'.$event->Compettition->name.'</strong>',
			$event->Compettition->id,
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
			'trans("history.crecursos.Compettition.updated") <strong>'.$event->Compettition->name.'</strong>',
			$event->Compettition->id,
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
			'trans("history.crecursos.Compettition.deleted") <strong>'.$event->Compettition->name.'</strong>',
			$event->Compettition->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Compettition.restored") <strong>'.$event->Compettition->name.'</strong>',
			$event->Compettition->id,
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
			'trans("history.crecursos.Compettition.permanently_deleted") <strong>'.$event->Compettition->name.'</strong>',
			$event->Compettition->id,
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
			\App\Events\Crecursos\Access\Compettition\CompettitionCreated::class,
			'App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Compettition\CompettitionUpdated::class,
			'App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Compettition\CompettitionDeleted::class,
			'App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Compettition\CompettitionRestored::class,
			'App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Compettition\CompettitionPermanentlyDeleted::class,
			'App\Listeners\Crecursos\Access\Compettition\CompettitionEventListener@onPermanentlyDeleted'
		);

	}
}