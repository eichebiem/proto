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

    public function edit(Room $room)
    {
        return view('settings.edit_room', compact('room'));
    }

    public function update($room, Request $request)
    {
        Room::find($room)->update(request(['name']));

        return response()->json();
    }

    public function delete($room)
    {
        Room::destroy($room);

        return response()->json();
    }

}
