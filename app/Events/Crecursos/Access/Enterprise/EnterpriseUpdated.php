<?php

namespace App\Events\Crecursos\Access\Enterprise;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EnterpriseUpdated
 * @package App\Events\Crecursos\Access\Enterprise
 */
class EnterpriseUpdated extends Event
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