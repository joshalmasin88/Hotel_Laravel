@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="/update/{{$room->id}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" value="{{$room->room_name}}" name="room_name" class="form-control" placeholder="Room Name">
                </div>
        
                <div class="form-group">
                    <input type="text" value="{{$room->description}}" name="description" class="form-control" placeholder="Description">
                </div>
        
                <div class="form-group">
                    <input type="number" value="{{$room->available}}" name="available" class="form-control" placeholder="Rooms Available">
                </div>
        
                <div class="form-group">
                    <input type="number" value="{{$room->price}}" min="1" step="any" name="price" class="form-control" placeholder="Price">
                </div>
        
                <div class="form-group">
                    <img src="{{ url('/images/'. $room->img_path)}}" class="img-thumbnail" alt="">
                    <input type="file" name="img">
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection