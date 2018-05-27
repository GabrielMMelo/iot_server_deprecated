@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
<!--    <script src="{ { asset('js/socket.io.js') } }"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script>
	console.log("oi");
       // var socket = io('http://localhost:3000');
        var socket = io('http://192.168.0.109:3000');
	console.log("oi2");
        socket.on("test-channel:App\\Events\\EventoTeste", function(message){
	    console.log("oi3");
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop
