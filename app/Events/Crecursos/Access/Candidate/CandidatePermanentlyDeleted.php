<?php

namespace App\Events\Crecursos\Access\Candidate;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class CandidatePermanentlyDeleted
 * @package App\Events\Crecursos\Access\Candidate
 */
class CandidatePermanentlyDeleted extends Event
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