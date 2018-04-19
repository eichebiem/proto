<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelsController extends Controller
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
        $level = new Level;
        $level->name = $r->name;
        $level->save();

        return response()->json();
    }

}
