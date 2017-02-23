<?php

namespace App\Events\Crecursos\Access\Estimated;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EstimatedDeleted
 * @package App\Events\Crecursos\Access\Estimated
 */
class EstimatedDeleted extends Event
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