@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="/booked" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ \Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ \Auth::user()->email }}">
                </div>
                
                <div class="form-group">
                    <input type="number" name="phone_number" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <input type="date" name="checkin" class="form-control" placeholder="Date Arrival">
                </div>
        
                <div class="form-group">
                    <input type="date" name="checkout" class="form-control" placeholder="Date Checkout">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection