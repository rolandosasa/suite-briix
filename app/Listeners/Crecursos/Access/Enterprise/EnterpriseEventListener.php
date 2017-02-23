<?php

namespace App\Listeners\Crecursos\Access\Enterprise;

/**
 * Class EnterpriseEventListener
 * @package App\Listeners\Crecursos\Access\Enterprise
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
			'trans("history.crecursos.enterprise.created") <strong>'.$event->enterprise->rfc.'</strong>',
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
			'trans("history.crecursos.enterprise.updated") <strong>'.$event->enterprise->rfc.'</strong>',
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
			'trans("history.crecursos.enterprise.deleted") <strong>'.$event->enterprise->rfc.'</strong>',
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
			\App\Events\Crecursos\Access\Enterprise\EnterpriseCreated::class,
			'App\Listeners\Crecursos\Access\Enterprise\EnterpriseEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Enterprise\EnterpriseUpdated::class,
			'App\Listeners\Crecursos\Access\Enterprise\EnterpriseEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Enterprise\EnterpriseDeleted::class,
			'App\Listeners\Crecursos\Access\Enterprise\EnterpriseEventListener@onDeleted'
		);
	}
}