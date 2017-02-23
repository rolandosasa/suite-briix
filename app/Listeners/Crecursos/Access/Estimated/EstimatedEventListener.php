<?php

namespace App\Listeners\Crecursos\Access\Estimated;

/**
 * Class EstimatedEventListener
 * @package App\Listeners\Crecursos\Access\Estimated
 */
class EstimatedEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Estimated';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.estimated.created") <strong>'.$event->estimated->id_concept.'</strong>',
			$event->estimated->id,
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
			'trans("history.crecursos.estimated.updated") <strong>'.$event->estimated->id_concept.'</strong>',
			$event->estimated->id,
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
			'trans("history.crecursos.estimated.deleted") <strong>'.$event->estimated->id_concept.'</strong>',
			$event->estimated->id,
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
			\App\Events\Crecursos\Access\Estimated\EstimatedCreated::class,
			'App\Listeners\Crecursos\Access\Estimated\EstimatedEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Estimated\EstimatedUpdated::class,
			'App\Listeners\Crecursos\Access\Estimated\EstimatedEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Estimated\EstimatedDeleted::class,
			'App\Listeners\Crecursos\Access\Estimated\EstimatedEventListener@onDeleted'
		);
	}
}