<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Curr;

class CurrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $curriculums = Curr::latest()->get();
        $levels = Level::all();

        return view('settings.curriculum', compact('curriculums', 'levels'));
    }

    public function store(Request $r)
    {
        $curriculum = new Curr;
        $curriculum->name = $r->name;
        $curriculum->grade_id = $r->grade_id;
        $curriculum->details = $r->details;
        $curriculum->save();

        return response()->json();
    }

    public function edit(Curr $curriculum)
    {
        return view('settings.edit_curriculum', compact('curriculum'));
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
