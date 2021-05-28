@extends('layouts.app')

@section('content')

<div class="jumbotron mt-0 pt-0">
    <h1 class="display-4">Hotel Laravel</h1>
    <p class="lead">The best hotel in the php regions!</p>
</div>


<div class="container">
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button class="close" data-dismiss="alert">x</button>
        {{ $message }}
    </div>
    @endif

    <div class="row">
        @foreach($rooms as $r)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ url('/images/'. $r->img_path) }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $r->room_name }}</h5>
                    <p class="card-text">{{ $r->description }}</p>
                    <a href="room/{{$r->id}}" class="btn btn-info">View Info</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection