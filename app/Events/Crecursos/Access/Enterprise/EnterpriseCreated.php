<?php

namespace App\Events\Crecursos\Access\Enterprise;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterpriseCreated
 * @package App\Events\Crecursos\Access\Enterprise
 */
class EnterpriseCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $Enterprise
	 */
	public $enterprise;

	/**
	 * @param $Enterprise
	 */
	public function __construct($enterprise)
	{
		$this->enterprise = $enterprise;
	}
}