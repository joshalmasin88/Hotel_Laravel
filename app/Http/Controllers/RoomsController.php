<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservations;


class RoomsController extends Controller

{
    public function index()
    {
        $rooms = Rooms::all();
        return view('rooms.index', compact('rooms'));
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


    // ADMIN AUTHORIZED ONLY

    public function staff()
    {
        if(Auth::check())
        {
            if(Auth::user()->is_admin == TRUE) {
                $rooms = Rooms::all();
                $resv = Reservations::all();
                return view('staff.dashboard', compact('rooms', 'resv'));
    
            } else {
                return redirect('/');
            }

        } else {
            return redirect()->back();
        }
    }


    public function create()
    {
        if(Auth::check())
        {
            if(Auth::user()->is_admin == TRUE)
            {
                return redirect()->back();

            } else {
                return redirect('/');
            }

        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {

        if(Auth::check())
        {
            if(Auth::user()->is_admin == TRUE) 
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
                return redirect('staff');
            }else {
                return redirect('/');
            }
        } else {
            return redirect()->back();
        }


        
    }


    public function destroy(Rooms $room)
    {
        if(Auth::check())
        {
            if(Auth::user()->is_admin == TRUE)
                $room->delete();
                return redirect('staff');

        } else {
            return redirect('/');
        }

    }

}
