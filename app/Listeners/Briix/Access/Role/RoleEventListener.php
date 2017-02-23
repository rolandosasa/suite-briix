<?php

namespace App\Listeners\Briix\Access\Role;

/**
 * Class RoleEventListener
 * @package App\Listeners\Briix\Access\Role
 */
class RoleEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Role';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.roles.created") <strong>'.$event->role->name.'</strong>',
			$event->role->id,
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
			'trans("history.briix.roles.updated") <strong>'.$event->role->name.'</strong>',
			$event->role->id,
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
			'trans("history.briix.roles.deleted") <strong>'.$event->role->name.'</strong>',
			$event->role->id,
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
			\App\Events\Briix\Access\Role\RoleCreated::class,
			'App\Listeners\Briix\Access\Role\RoleEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\Role\RoleUpdated::class,
			'App\Listeners\Briix\Access\Role\RoleEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\Role\RoleDeleted::class,
			'App\Listeners\Briix\Access\Role\RoleEventListener@onDeleted'
		);
	}
}