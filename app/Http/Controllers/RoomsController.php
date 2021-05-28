<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'description' => 'required',
            'available' => 'required',
            'price' => 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $fileName = time().'.'.$request->img->extension();  

        $path = $request->img->move(public_path('images'), $fileName);

        $room = new Rooms();
        $room->room_name = $request->room_name;
        $room->description = $request->description;
        $room->available = $request->available;
        $room->price = $request->price;
        $room->img_path = $fileName;

        $room->save();
        return redirect('/');

    }

    public function show(Rooms $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function book(Rooms $room)
    {
        if(Auth::check())
        {
            return view('rooms.book', compact('room'));
        } else {
            return redirect()->back()->with('error', 'You must be logged in to book a room');
        }
    }

    public function booked(Request $request)
    {
        $email = $request->email;

        $details = [
            'title' => 'Thank you for booking with us!',
            'body' => '<p>Thank you '.Auth::user()->name.  '</p> '
        ];

        Mail::to($email)->send(new ConfirmationMail($details));

        // -1 Avaiable in database for available rooms column
        DB::table('rooms')->decrement('available');
        return redirect('/')->with('success', 'Thank you for booking with Hotel Laravel! Please Check your Email For Confirmation');
    }
}
