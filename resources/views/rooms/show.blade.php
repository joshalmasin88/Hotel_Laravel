@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ $message }}
                </div>
            @endif
            <h1 class="text-center">{{ $room->room_name }}</h1>
            <img src="{{ url('/images/'. $room->img_path)}}" class="img-fluid" alt="">
            <p>{{ $room->description }}</p>
            <p>Available rooms: {{ $room->available }}</p>
            <p>${{ $room->price }}/Night</p>
            <a href="/book/{{ $room->id }}" class="btn btn-primary">Book</a>
        </div>
    </div>
</div>


@endsection