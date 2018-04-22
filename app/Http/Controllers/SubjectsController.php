<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curr;
use App\Subject;

class SubjectsController extends Controller
{
    public function create()
    {
        $curriculums = Curr::all();

        return view('subjects.create', compact('curriculums'));
    }

    public function store(Request $r)
    {
        $subj = new Subject;
        $subj->curr_id = $r->curr_id;
        $subj->code = $r->code;
        $subj->description = $r->description;
        $subj->yearlvl = $r->yearlvl;
        $subj->units = $r->units;
        $subj->semester = $r->semester;
        $subj->prereq = $r->prereq;
        $subj->save();

        return response()->json();
    }

    public function index()
    {
        $subjs = Subject::all();
        $curriculums = Curr::all();

        return view('subjects.all_subjects', compact('subjs', 'curriculums'));
    }

}
