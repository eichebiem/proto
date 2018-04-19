<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::latest()->get();

        return view('settings.room', compact('rooms'));
    }

    public function store(Request $r)
    {
        $room = new Room;
        $room->name = $r->name;
        $room->save();

        return response()->json();
    }

}
