<?php

namespace App\Listeners\Crecursos\Access\Job;

/**
 * Class JobEventListener
 * @package App\Listeners\Crecursos\Access\Job
 */
class JobEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Job';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Job.created") <strong>'.$event->Job->name.'</strong>',
			$event->Job->id,
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
			'trans("history.crecursos.Job.updated") <strong>'.$event->Job->name.'</strong>',
			$event->Job->id,
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
			'trans("history.crecursos.Job.deleted") <strong>'.$event->Job->name.'</strong>',
			$event->Job->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Job.restored") <strong>'.$event->Job->name.'</strong>',
			$event->Job->id,
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
			'trans("history.crecursos.Job.permanently_deleted") <strong>'.$event->Job->name.'</strong>',
			$event->Job->id,
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
			\App\Events\Crecursos\Access\Job\JobCreated::class,
			'App\Listeners\Crecursos\Access\Job\JobEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Job\JobUpdated::class,
			'App\Listeners\Crecursos\Access\Job\JobEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Job\JobDeleted::class,
			'App\Listeners\Crecursos\Access\Job\JobEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Job\JobRestored::class,
			'App\Listeners\Crecursos\Access\Job\JobEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Job\JobPermanentlyDeleted::class,
			'App\Listeners\Crecursos\Access\Job\JobEventListener@onPermanentlyDeleted'
		);

	}
}