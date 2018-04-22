<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class ProgramsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $programs = Program::latest()->get();

        return view('settings.program', compact('programs'));
    }

    public function store(Request $r)
    {
        $program = new Program;
        $program->description = $r->description;
        $program->code = $r->code;
        $program->save();

        return response()->json();
    }

    public function edit(Program $program)
    {
        return view('settings.edit_program', compact('program'));
    }

    public function update($program, Request $request)
    {
        Program::find($program)->update(request(['description', 'code']));

        return response()->json();
    }

    public function delete($program)
    {
        Program::destroy($program);

        return response()->json();
    }

}
