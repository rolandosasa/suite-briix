<?php

namespace App\Events\Crecursos\Access\Compettition;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class CompettitionCreated
 * @package App\Events\Crecursos\Access\Compettition
 */
class CompettitionCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $Compettition
	 */
	public $Compettition;

	/**
	 * @param $Compettition
	 */
	public function __construct($Compettition)
	{
		$this->Compettition = $Compettition;
	}
}