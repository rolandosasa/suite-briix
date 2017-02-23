<?php

namespace App\Events\Backend\Access\Payment;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class PaymentCreated
 * @package App\Events\Backend\Access\Payment
 */
class PaymentCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $Payment
	 */
	public $payment;

	/**
	 * @param $Payment
	 */
	public function __construct($payment)
	{
		$this->payment = $payment;
	}
}