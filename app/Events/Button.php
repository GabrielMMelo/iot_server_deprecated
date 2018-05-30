<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class Button implements ShouldBroadcast{
    use SerializesModels;

    public $data;

    public function __construct($id, $value, $value_2){
        $this->data = array(
	    'id' => $id, 
        'value' => $value,
        'value_2' =>$value_2
        );
    }

    public function broadcastOn(){
        return ['button-channel'];
    }
}
