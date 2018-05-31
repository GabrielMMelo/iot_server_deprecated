@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="card mt-3">
        <span class="display-4">TVs</span>
        <div class="row justify-content-center" style="font-size: 2rem;">
        @foreach ($tvs as $tv)
        	<div class="col-lg-4 col-md-6 col-sm-12 mb-3">		
        		<div class="card mt-5">
        		  <div class="card-body">
        		    <h5 class="card-title">TV {{ $tv->owner }}</h5>
        		    <a href="{{ route('tv.view', ['count' => $tv->count, 'id' => $tv->id_esp]) }}" class="btn btn-success">Acessar</a>
        		  </div>
        		</div>
        	</div>
        @endforeach
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
