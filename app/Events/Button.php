<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class Button implements ShouldBroadcast{
    use SerializesModels;

    public $data;

    public function __construct($id, $value){
        $this->data = array(
	    'id' => $id, 
        'value' => $value
        );
    }

    public function broadcastOn(){
        return ['button-channel'];
    }
}
