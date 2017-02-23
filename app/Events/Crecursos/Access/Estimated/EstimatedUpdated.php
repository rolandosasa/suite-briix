<?php

namespace App\Events\Crecursos\Access\Estimated;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EstimatedUpdated
 * @package App\Events\Crecursos\Access\Estimated
 */
class EstimatedUpdated extends Event
{
	use SerializesModels;

	/**
	 * @var $Estimated
	 */
	public $estimated;

	/**
	 * @param $Estimated
	 */
	public function __construct($estimated)
	{
		$this->estimated = $estimated;
	}
}