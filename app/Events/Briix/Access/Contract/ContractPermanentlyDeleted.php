<?php

namespace App\Events\Briix\Access\Contract;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ContractPermanentlyDeleted
 * @package App\Events\Briix\Access\Contract
 */
class ContractPermanentlyDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $contract
	 */
	public $contract;

	/**
	 * @param $contract
	 */
	public function __construct($contract)
	{
		$this->contract = $contract;
	}
}