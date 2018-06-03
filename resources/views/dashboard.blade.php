@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

     <div class="card mt-3 bg-light" style="box-shadow:         inset 0px 0px 13px -8px rgba(50, 50, 50, 1);">
        <span class="display-4 mt-2">Lights <i class="fas fa-lightbulb text-muted"></i></span>
        <div class="row justify-content-center" style="font-size: 2rem;">
        @foreach ($lights as $light)
            <div class="col-lg-4 col-md-6 col-sm-10 mb-3">      
                <div class="card mt-3" style="box-shadow: 1px 5px 10px #333;">
                  <div class="card-body">
                    <h5 class="card-title"><span>#{{ $light->count }}</span> Light </h5>
                    <p class="text-muted lead"> {{ $light->local }}</p>
                    <form action="{{ route('button.store') }}" method="POST">
                        {{ csrf_field()  }}
                        <input type="hidden" value="{{ $light->id_esp }}" name="id">
                        <input type="hidden" value="light" name="type">
                        <input type="hidden" value="power" name="value">
                        <button  type="submit" class="btn">Turn On/Off</button>
                        <span id="status-{{ $light->id_esp }}"></span>
                        <script src="{{ asset('js/socket.io.js') }}"></script> 
                        <script>
                           // var socket = io('http://localhost:3000');
                            var socket = io('http://192.168.0.109:3000');
                            socket.on("button-channel:App\\Events\\Button", function(message){
                                // increase the power everytime we load fire route
                                $('#status-').text(parseInt($('#power').text()) + parseInt(message.data.id));
                            });
                        </script>

                    </form>
                  </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <div class="card my-3 bg-light" style="box-shadow:         inset 0px 0px 13px -8px rgba(50, 50, 50, 0.78);">
        <span class="display-4 mt-2">TVs <i class="fas fa-tv text-muted"></i></span>
        <div class="row justify-content-center" style="font-size: 2rem;">
        @foreach ($tvs as $tv)
        	<div class="col-lg-4 col-md-6 col-sm-10 mb-3">		
        		<div class="card mt-3" style="box-shadow: 1px 5px 10px #333;">
        		  <div class="card-body">
        		    <h5 class="card-title"><span>#{{ $tv->count }}</span> TV </h5>
                    <p class="text-muted lead"> {{ $tv->local }}</p>
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
