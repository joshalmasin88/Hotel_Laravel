@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Reservations</h2>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Room</th>
                    <th scope="col">Date Arrival</th>
                    <th scope="col">Date Checkout</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($resv as $customer)
                  <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->room_name }}</td>
                    <td>{{ $customer->date_arrival }}</td>
                    <td>{{ $customer->date_checkout }}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Rooms</h2>
            <div class="text-right">
                <a href="create" class="btn btn-primary mb-2">Add Room</a>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Room ID</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $r)
                  <tr>
                    <th scope="row">{{ $r->id }}</th>
                    <td>{{ $r->room_name }}</td>
                    <td>
                        <a href="edit/{{$r->id}}" class="btn btn-info">Edit</a>
                        <form action="remove/{{$r->id}}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection