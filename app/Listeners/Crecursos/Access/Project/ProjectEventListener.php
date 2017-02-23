<?php

namespace App\Listeners\Crecursos\Access\Project;

/**
 * Class ProjectEventListener
 * @package App\Listeners\Crecursos\Access\Project
 */
class ProjectEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Project';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.project.created") <strong>'.$event->project->name.'</strong>',
			$event->project->id,
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
			'trans("history.crecursos.project.updated") <strong>'.$event->project->name.'</strong>',
			$event->project->id,
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
			'trans("history.crecursos.project.deleted") <strong>'.$event->project->name.'</strong>',
			$event->project->id,
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
			\App\Events\Crecursos\Access\Project\ProjectCreated::class,
			'App\Listeners\Crecursos\Access\Project\ProjectEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Project\ProjectUpdated::class,
			'App\Listeners\Crecursos\Access\Project\ProjectEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Project\ProjectDeleted::class,
			'App\Listeners\Crecursos\Access\Project\ProjectEventListener@onDeleted'
		);
	}
}