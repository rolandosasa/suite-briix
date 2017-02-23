<?php

namespace App\Events\Crecursos\Access\Job;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JobCreated extends Event
{
    use SerializesModels;

    public $Job;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($Job)
    {
        $this->Job = $Job;
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
