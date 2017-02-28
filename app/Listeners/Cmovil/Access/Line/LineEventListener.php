<?php

namespace App\Listeners\Cmovil\Access\Line;

/**
 * Class EnterpriseEventListener
 * @package App\Listeners\Cmovil\Access\Line
 */
class LineEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Line';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.lines.created") <strong>'.$event->line->name.'</strong>',
			$event->line->id,
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
			'trans("history.cmovil.lines.updated") <strong>'.$event->line->name.'</strong>',
			$event->line->id,
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
			'trans("history.cmovil.lines.deleted") <strong>'.$event->line->name.'</strong>',
			$event->line->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.cmovil.lines.restored") <strong>'.$event->line->name.'</strong>',
			$event->line->id,
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
			'trans("history.cmovil.lines.permanently_deleted") <strong>'.$event->line->name.'</strong>',
			$event->line->id,
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
			\App\Events\Cmovil\Access\Line\LineCreated::class,
			'App\Listeners\Cmovil\Access\Line\LineEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Enterprise\EnterpriseUpdated::class,
			'App\Listeners\Cmovil\Access\Line\LineEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Line\LineDeleted::class,
			'App\Listeners\Cmovil\Access\Line\LineEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Line\LineRestored::class,
			'App\Listeners\Cmovil\Access\Line\LineEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Cmovil\Access\Line\LinePermanentlyDeleted::class,
			'App\Listeners\Cmovil\Access\Line\LineEventListener@onPermanentlyDeleted'
		);

	}
}