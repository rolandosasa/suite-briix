<?php

namespace App\Events\Briix\Access\Packet;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class packetUpdated
 * @package App\Events\Briix\Access\packet
 */
class PacketUpdated extends Event
{
	use SerializesModels;

	/**
	 * @var $packet
	 */
	public $packet;

	/**
	 * @param $packet
	 */
	public function __construct($packet)
	{
		$this->packet = $packet;
	}
}