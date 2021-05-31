@extends('layouts.app')

@section('content')



<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ url('/images/1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ url('/images/2.jpeg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ url('/images/3.jpeg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button class="close" data-dismiss="alert">x</button>
        {{ $message }}
    </div>
    @endif

    <div class="row mt-5">
    
        @foreach($rooms as $r)
        <div class="col-md-3">
            <div class="card mt-2 mb-2">
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