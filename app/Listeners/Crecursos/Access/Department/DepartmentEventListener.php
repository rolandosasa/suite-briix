<?php

namespace App\Listeners\Crecursos\Access\Department;

/**
 * Class DepartmentEventListener
 * @package App\Listeners\Crecursos\Access\Department
 */
class DepartmentEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Department';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.department.created") <strong>'.$event->department->id_department.'</strong>',
			$event->department->id,
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
			'trans("history.crecursos.department.updated") <strong>'.$event->department->id_department.'</strong>',
			$event->department->id,
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
			'trans("history.crecursos.department.deleted") <strong>'.$event->department->id_department.'</strong>',
			$event->department->id,
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
			\App\Events\Crecursos\Access\Department\DepartmentCreated::class,
			'App\Listeners\Crecursos\Access\Department\DepartmentEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Department\DepartmentUpdated::class,
			'App\Listeners\Crecursos\Access\Department\DepartmentEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Department\DepartmentDeleted::class,
			'App\Listeners\Crecursos\Access\Department\DepartmentEventListener@onDeleted'
		);
	}
}