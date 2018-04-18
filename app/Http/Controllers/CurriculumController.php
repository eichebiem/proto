<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;

class CurriculumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $curriculums = Curriculum::latest()->get();
        return view('settings.curriculum', compact('curriculums'));
    }

    public function store(Request $r)
    {
        $room = new Level;
        $room->name = $r->name;
        $room->save();

        return response()->json();
    }
    
}
