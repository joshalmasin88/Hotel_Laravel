<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;

class ReservationController extends Controller
{
    public function booked(Request $request)
    {
        $today = date('Y-m-d');

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date_arrival' => 'required|date|after:today',
            'date_checkout' => 'required|date|after:tomorrow'
        ]);

        $resv = new Reservations();
        $resv->name = $request->name;
        $resv->email = $request->email;
        $resv->date_arrival = $request->date_arrival;
        $resv->date_checkout = $request->date_checkout;
        $resv->room_name = $request->room_name;

        $resv->save();


        // Get The Amount of Days Of Stay
        $stayed_days = ceil(abs(strtotime($request->date_arrival) - strtotime($request->date_checkout)) / 86400);
        (session(['stay_days' => $stayed_days]));


        $email = $request->email;

        $details = [
            'title' => 'Thank you for booking with us!',
            'body' => '<p>Thank you '.Auth::user()->name.  '</p> '
        ];

        Mail::to($email)->send(new ConfirmationMail($details));

        // -1 Avaiable in database for available rooms column
        DB::table('rooms')->decrement('available');

        return redirect('pay');
    }


}
