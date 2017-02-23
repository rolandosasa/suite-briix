<?php

namespace App\Listeners\Cmovil\Access\Role;

/**
 * Class RoleEventListener
 * @package App\Listeners\Cmovil\Access\Role
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
			'trans("history.cmovil.roles.created") <strong>'.$event->role->name.'</strong>',
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
			'trans("history.cmovil.roles.updated") <strong>'.$event->role->name.'</strong>',
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
			'trans("history.cmovil.roles.deleted") <strong>'.$event->role->name.'</strong>',
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
			\App\Events\Cmovil\Access\Role\RoleCreated::class,
			'App\Listeners\Cmovil\Access\Role\RoleEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Role\RoleUpdated::class,
			'App\Listeners\Cmovil\Access\Role\RoleEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Role\RoleDeleted::class,
			'App\Listeners\Cmovil\Access\Role\RoleEventListener@onDeleted'
		);
	}
}