<?php

namespace App\Listeners\Crecursos\Access\Candidate;

/**
 * Class CandidateEventListener
 * @package App\Listeners\Crecursos\Access\Candidate
 */
class CandidateEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Candidate';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Candidate.created") <strong>'.$event->Candidate->name.'</strong>',
			$event->Candidate->id,
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
			'trans("history.crecursos.Candidate.updated") <strong>'.$event->Candidate->name.'</strong>',
			$event->Candidate->id,
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
			'trans("history.crecursos.Candidate.deleted") <strong>'.$event->Candidate->name.'</strong>',
			$event->Candidate->id,
			'trash',
			'bg-maroon'
		);
	}

	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.crecursos.Candidate.restored") <strong>'.$event->Candidate->name.'</strong>',
			$event->Candidate->id,
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
			'trans("history.crecursos.Candidate.permanently_deleted") <strong>'.$event->Candidate->name.'</strong>',
			$event->Candidate->id,
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
			\App\Events\Crecursos\Access\Candidate\CandidateCreated::class,
			'App\Listeners\Crecursos\Access\Candidate\CandidateEventListener@onCreated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Candidate\CandidateUpdated::class,
			'App\Listeners\Crecursos\Access\Candidate\CandidateEventListener@onUpdated'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Candidate\CandidateDeleted::class,
			'App\Listeners\Crecursos\Access\Candidate\CandidateEventListener@onDeleted'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Candidate\CandidateRestored::class,
			'App\Listeners\Crecursos\Access\Candidate\CandidateEventListener@onRestored'
		);

		$events->listen(
			\App\Events\Crecursos\Access\Candidate\CandidatePermanentlyDeleted::class,
			'App\Listeners\Crecursos\Access\Candidate\CandidateEventListener@onPermanentlyDeleted'
		);

	}
}