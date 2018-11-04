<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

# Classe que herda o handler de Broadcast padrão do Laravel
#
# ** Essa classe é instanciada em iot_server/app/Http/Controllers/buttonController.php **
class Button implements ShouldBroadcast{
    use SerializesModels;

    # Conteúdo a ser enviado
    public $data;

    # Método construtor da classe
    public function __construct($id, $value, $type, $model, $value_2){
        $this->data = array(
        # ID do ESP8266
	    'id' => $id, 
        # Valor a ser setado pelo ESP
        'value' => $value,
        # Tipo do periférico (light, Tv ou node)
        'type' => $type,
        # Modelo da Tv (se o periférico for uma Tv)
        'model' => $model,
        # Valor auxiliar utilizado para Tv
        'value_2' =>$value_2
        );
    }

    # Método de envio do broadcast no canal 'button-channel'
    # 
    # ** O valor de $data será enviado por broadcast e recebido pelo único inscrito no canal. Veja o arquivo iot_server/Socket.io para visualizar o recebimento **
    public function broadcastOn(){
        return ['button-channel'];
    }
}
