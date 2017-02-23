<?php

namespace App\Listeners\Briix\Access\Contract;

/**
 * Class ContractEventListener
 * @package App\Listeners\Briix\Access\Contract
 */
class ContractEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Contract';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.contracts.created") <strong>'.$event->contract->name.'</strong>',
			$event->contract->id,
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
			'trans("history.briix.contracts.updated") <strong>'.$event->contract->name.'</strong>',
			$event->contract->id,
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
			'trans("history.briix.contracts.deleted") <strong>'.$event->contract->name.'</strong>',
			$event->contract->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.briix.contracts.restored") <strong>'.$event->contract->name.'</strong>',
			$event->contract->id,
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
			'trans("history.briix.contracts.permanently_deleted") <strong>'.$event->contract->name.'</strong>',
			$event->contract->id,
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
			\App\Events\Briix\Access\Contract\ContractCreated::class,
			'App\Listeners\Briix\Access\Contract\ContractEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Briix\Access\Contract\ContractUpdated::class,
			'App\Listeners\Briix\Access\Contract\ContractEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Briix\Access\Contract\ContractDeleted::class,
			'App\Listeners\Briix\Access\Contract\ContractEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Briix\Access\Contract\ContractRestored::class,
			'App\Listeners\Briix\Access\Contract\ContractEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Briix\Access\Contract\ContractPermanentlyDeleted::class,
			'App\Listeners\Briix\Access\Contract\ContractEventListener@onPermanentlyDeleted'
		);

	}
}