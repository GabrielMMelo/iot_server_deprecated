<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class Button implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($id)
    {
        $this->data = array(
	    'id' => $id
        );
    }

    public function broadcastOn()
    {
        return ['button-channel'];
    }
}
