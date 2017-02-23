<?php

namespace App\Listeners\Crecursos\Access\Personal;

/**
 * Class PersonalEventListener
 * @package App\Listeners\Crecursos\Access\Personal
 */
class PersonalEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Personal';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.personal.created") <strong>'.$event->personal->id_personal.'</strong>',
			$event->personal->id,
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
			'trans("history.crecursos.personal.updated") <strong>'.$event->personal->id_personal.'</strong>',
			$event->personal->id,
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
			'trans("history.crecursos.personal.deleted") <strong>'.$event->personal->name.'</strong>',
			$event->personal->id,
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
			\App\Events\Crecursos\Access\Personal\PersonalCreated::class,
			'App\Listeners\Crecursos\Access\Personal\PersonalEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Personal\PersonalUpdated::class,
			'App\Listeners\Crecursos\Access\Personal\PersonalEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Personal\PersonalDeleted::class,
			'App\Listeners\Crecursos\Access\Personal\PersonalEventListener@onDeleted'
		);
	}
}