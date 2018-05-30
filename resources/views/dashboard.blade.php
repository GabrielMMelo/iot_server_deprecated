@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
	<div class="col-4">		
		<div class="card mt-5">
		  <div class="card-body">
		    <h5 class="card-title">Controle Remoto</h5>
		    <a href="{{ route('tv.view') }}" class="btn btn-success">Acessar</a>
		  </div>
		</div>
	</div>
</div>


@endsection

@section('footer')
    <script src="{{ asset('js/socket.io.js') }}"></script> 
    <script> /*
       // var socket = io('http://localhost:3000');
        var socket = io('http://192.168.0.109:3000');
        socket.on("button-channel:App\\Events\\Button", function(message){
            // increase the power everytime we load fire route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.id));
        });*/
    </script>
@endsection
