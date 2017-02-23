<?php

namespace App\Listeners\Briix\Access\User;

/**
 * Class UserEventListener
 * @package App\Listeners\Briix\Access\User
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
			'trans("history.briix.users.created") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.updated") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.deleted") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.restored") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.permanently_deleted") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.changed_password") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.deactivated") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.briix.users.reactivated") <strong>'.$event->user->name.'</strong>',
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
			\App\Events\Briix\Access\User\UserCreated::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserUpdated::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserDeleted::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserRestored::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserPermanentlyDeleted::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onPermanentlyDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserPasswordChanged::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onPasswordChanged'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserDeactivated::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onDeactivated'
		);

		$events->listen(
			\App\Events\Briix\Access\User\UserReactivated::class,
			'App\Listeners\Briix\Access\User\UserEventListener@onReactivated'
		);
	}
}