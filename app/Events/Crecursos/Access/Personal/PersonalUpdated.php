<?php

namespace App\Events\Crecursos\Access\Personal;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class PersonalUpdated extends Event
{
	use SerializesModels;

	/**
		* Create a new event instance.
		*
		* @return void
		*/
	public $personal;

  public function __construct($personal)
  {
    $this->personal = $personal;
  }

	/**
		* Get the channels the event should be broadcast on.
		*
		* @return array
	*/
	public function broadcastOn()
	{
			return [];
	}
}
