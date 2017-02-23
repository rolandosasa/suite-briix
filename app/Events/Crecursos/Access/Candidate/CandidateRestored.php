<?php

namespace App\Events\Crecursos\Access\Candidate;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class CandidateRestored
 * @package App\Events\Crecursos\Access\Candidate
 */
class CandidateRestored extends Event
{
	use SerializesModels;

	/**
	 * @var $Candidate
	 */
	public $Candidate;

	/**
	 * @param $Candidate
	 */
	public function __construct($Candidate)
	{
		$this->Candidate = $Candidate;
	}
}