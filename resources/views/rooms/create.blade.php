@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif            <form action="post" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="room_name" class="form-control" placeholder="Room Name">
                </div>
        
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>
        
                <div class="form-group">
                    <input type="number" name="available" class="form-control" placeholder="Rooms Available">
                </div>
        
                <div class="form-group">
                    <input type="number" min="1" step="any" name="price" class="form-control" placeholder="Price">
                </div>
        
                <div class="form-group">
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