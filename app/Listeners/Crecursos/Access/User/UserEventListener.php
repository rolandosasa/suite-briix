<?php

namespace App\Listeners\Crecursos\Access\User;

/**
 * Class UserEventListener
 * @package App\Listeners\Crecursos\Access\User
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
			'trans("history.backend.users.created") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.updated") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.deleted") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.restored") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.permanently_deleted") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.changed_password") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.deactivated") <strong>'.$event->user->name.'</strong>',
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
			'trans("history.backend.users.reactivated") <strong>'.$event->user->name.'</strong>',
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
			\App\Events\Crecursos\Access\User\UserCreated::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserUpdated::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserDeleted::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserRestored::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserPermanentlyDeleted::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onPermanentlyDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserPasswordChanged::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onPasswordChanged'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserDeactivated::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onDeactivated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\User\UserReactivated::class,
			'App\Listeners\Crecursos\Access\User\UserEventListener@onReactivated'
		);
	}
}