<?php

namespace App\Listeners\Cmovil\Access\User;

/**
 * Class UserEventListener
 * @package App\Listeners\Cmovil\Access\User
 */
class UserEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'User';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.users.created") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
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
			'trans("history.cmovil.users.updated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
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
			'trans("history.cmovil.users.deleted") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.users.restored") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
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
			'trans("history.cmovil.users.permanently_deleted") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onPasswordChanged($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.users.changed_password") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'lock',
			'bg-blue'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.users.deactivated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'times',
			'bg-yellow'
		);
	}

	/**
	 * @param $event
	 */
	public function onReactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.users.reactivated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'check',
			'bg-green'
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
			\App\Events\Cmovil\Access\User\UserCreated::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserUpdated::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserDeleted::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserRestored::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserPermanentlyDeleted::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onPermanentlyDeleted'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserPasswordChanged::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onPasswordChanged'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserDeactivated::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onDeactivated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\User\UserReactivated::class,
			'App\Listeners\Cmovil\Access\User\UserEventListener@onReactivated'
		);
	}
}