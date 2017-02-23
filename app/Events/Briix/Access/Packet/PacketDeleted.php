<?php

namespace App\Events\Briix\Access\Packet;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class packetDeleted
 * @package App\Events\Briix\Access\packet
 */
class PacketDeleted extends Event
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