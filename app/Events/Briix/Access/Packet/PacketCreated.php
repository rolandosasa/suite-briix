<?php

namespace App\Events\Briix\Access\Packet;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class packetCreated
 * @package App\Events\Briix\Access\packet
 */
class PacketCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $packet
	 */
	public $packet;

	/**
	 * @param $role
	 */
	public function __construct($packet)
	{
		$this->packet = $packet;
	}
}