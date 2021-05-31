@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ url('/images/'. $room->img_path) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p><b>{{ $room->room_name }}</b></p>
                  <p class="card-text"><b>Price:</b> {{ $room->price }}</p>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button class="close" data-dismiss="alert">x</button>
                {{ $message }}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($room->available > 0)
            <form action="/booked" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ \Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ \Auth::user()->email }}">
                </div>

                <div class="form-group">
                    <label for="">Arrival Date</label>
                    <input type="date" name="date_arrival" class="form-control" placeholder="Date Arrival">
                </div>
        
                <div class="form-group">
                    <label for="">Check Out</label>
                    <input type="date" name="date_checkout" class="form-control" placeholder="Date Checkout">
                </div>

                <input type="hidden" name="room_name" value="{{$room->room_name}}">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @else
            <h1 class="text-center">Sorry this room is not avaiable at this time!</h1>
            @endif
            <?php
            
            (session(['price' => $room->price]))
            ?>
        </div>
    </div>
</div>
    
@endsection