@extends('layouts.master')

@section('title', 'Tv 1')

@section('link')
    @parent

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
@endsection

@section('content')
    
    
    <div class="row justify-content-center mt-3">
        <div class="col-6 col-lg-4 col-md-5 col-sm-6 col-8 col-4">
            <div class="card bg-dark">
                <div class="row justify-content-center mt-1 " style="font-size: 1.5rem;">
                    
                    <!-- POWER & SOURCE -->
                    <div class="col-6">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}" name="id">
                            <input type="hidden" value="source" name="value">
                            <button  type="submit" class="btn"><i class="fas fa-th-large" style="font-size: "></i></button>
                        </form>
                    </div>
                    <div class="col-6 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}" name="id">
                            <input type="hidden" value="power" name="value">
                            <button type="submit" class="btn"><i class="fas fa-power-off" style="font-size: 1.6rem"></i></button>
                        </form>
                        
                    </div>

                    <!-- DIRECTION -->
                    <div class="col-12 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="up" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-angle-up"></i></button>
                        </form>
                    </div>
                    <div class="col-3 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="left" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-angle-left"></i></button>
                        </form>
                    </div>
                    <div class="col-6 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="select" name="value">
                            <button type="submit" style="background: transparent; border: none;" class="text-light"><i class="fas fa-circle"></i></button>
                        </form>
                    </div>
                    <div class="col-3 mb-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="right" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-angle-right"></i></button>
                        </form>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="down" name="value">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-angle-down"></i></button>
                        </form>
                    </div>

                    <!-- VOLUME & CHANNEL -->
                    <div class="col-6 mt-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="volume" name="value">
                            <input type="hidden" value="1" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-plus"></i></button>
                        </form>
                    </div>
                    <div class="col-6 mt-4">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="channel" name="value">
                            <input type="hidden" value="1" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-plus"></i></button>
                        </form>
                    </div>
                    <div class="col-6 mt-4">
                        <p class="lead text-white" style="font-size: 1rem">VOL</a>
                    </div>
                    <div class="col-6 mt-4">
                        <p class="lead text-white" style="font-size: 1rem">CH</a>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="volume" name="value">
                            <input type="hidden" value="0" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-minus"></i></button>
                        </form>
                    </div>
                    <div class="col-6 mb-3">
                        <form action="{{ route('button.store') }}" method="POST">
                            {{ csrf_field()  }}
                            <input type="hidden" value="{{ $id }}"  name="id"> 
                            <input type="hidden" value="channel" name="value">
                            <input type="hidden" value="0" name="value_2">
                            <button type="submit" style=" background: transparent; border: none;" class="text-light"><i class="fas fa-minus"></i></button>
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
