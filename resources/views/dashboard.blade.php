@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    
    
    <div class="row justify-content-center mt-5">
        <div class="col-6 col-lg-3 col-md-5 col-sm-6 col-8 col-4">
            <div class="card bg-dark">
                <div class="row justify-content-center display-4">
                    
                    <!-- POWER & SOURCE -->
                    <div class="col-6">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}" name="id">
                            <input type="hidden" value="source" name="value">
                            <button  type="submit" class="btn">SOURCE</button>
                        </form>
                    </div>
                    <div class="col-6 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}" name="id">
                            <input type="hidden" value="power" name="value">
                            <button type="submit" class="btn">POWER</button>
                        </form>
                        
                    </div>

                    <!-- DIRECTION -->
                    <div class="col-12 mb-2">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="up" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">^</button>
                        </form>
                    </div>
                    <div class="col-4 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="left" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><</button>
                        </form>
                    </div>
                    <div class="col-4 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="select" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">o</button>
                        </form>
                    </div>
                    <div class="col-4 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="right" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">></button>
                        </form>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="down" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">v</button>
                        </form>
                    </div>

                    <!-- VOLUME & CHANNEL -->
                    <div class="col-6 mt-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="volume" name="value">
                            <input type="hidden" value="1" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">+</button>
                        </form>
                    </div>
                    <div class="col-6 mt-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="channel" name="value">
                            <input type="hidden" value="1" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">+</button>
                        </form>
                    </div>
                    <div class="col-6 mt-4">
                        <p class="lead text-white">VOL</a>
                    </div>
                    <div class="col-6 mt-4">
                        <p class="lead text-white">CH</a>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="volume" name="value">
                            <input type="hidden" value="0" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">-</button>
                        </form>
                    </div>
                    <div class="col-6 mb-3">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $tv }}"  name="id"> 
                            <input type="hidden" value="channel" name="value">
                            <input type="hidden" value="0" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light">-</button>
                        </form>
                    </div>
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
