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

    public function edit(Level $level)
    {
        return view('settings.edit_level', compact('level'));
    }

    public function update($level, Request $request)
    {
        Level::find($level)->update(request(['name']));

        return response()->json();
    }

    public function delete($level)
    {
        Level::destroy($level);

        return response()->json();
    }

}
