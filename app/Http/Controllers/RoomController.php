<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::all();

        return view('settings.room', compact('rooms'));
    }

    public function store(Request $r)
    {
        return $r;
    }

}
