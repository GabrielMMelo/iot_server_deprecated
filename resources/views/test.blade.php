@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <script src="{{ asset('js/socket.io.js') }}"></script> 
    <script>
       // var socket = io('http://localhost:3000');
        var socket = io('http://192.168.0.109:3000');
        socket.on("button-channel:App\\Events\\Button", function(message){
            // increase the power everytime we load fire route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.id));
        });
    </script>
@stop
