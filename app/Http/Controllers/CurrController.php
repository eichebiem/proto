<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
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
        $programs = Program::all();

        return view('settings.curriculum', compact('curriculums', 'programs'));
    }

    public function store(Request $r)
    {
        $curriculum = new Curr;
        $curriculum->name = $r->name;
        $curriculum->program_id = $r->program_id;
        $curriculum->details = $r->details;
        $curriculum->save();

        return response()->json();
    }

    public function edit(Curr $curriculum)
    {
        $programs = Program::all();

        return view('settings.edit_curriculum', compact('curriculum', 'programs'));
    }

    public function update($curriculum, Request $request)
    {
        Curr::find($curriculum)->update(request(['name', 'program_id', 'details']));

        return response()->json();
    }

    public function delete($curriculum)
    {
        Curr::destroy($curriculum);

        return response()->json();
    }
    
}
