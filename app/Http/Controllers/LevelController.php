<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $levels = Level::latest()->get();

        return view('settings.level', compact('levels'));
    }

    public function store(Request $r)
    {
        $room = new Level;
        $room->name = $r->name;
        $room->save();

        return response()->json();
    }

}
