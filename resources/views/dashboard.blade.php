@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    
    <div class="row justify-content-center mt-4">
        @for ($i = 1; $i < 3; $i++)
            <div class="col-4">
                <form action="{{ route('button.store') }}" method="POST">
                    {{ csrf_field()  }}
                    <input type="hidden" value="{{ $i }}" name="id">
                    <button type="submit" class="btn"> Dispositivo {{ $i }}</button>
                </form>
            </div>
        @endfor
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
