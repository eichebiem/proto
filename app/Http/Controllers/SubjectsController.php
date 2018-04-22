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
        $subj->save();

        return response()->json();
    }

    public function index(Request $request)
    {
        $curriculums = Curr::all();

        $subjs = Subject::where('curr_id', $request->curr_id)->get();

        // dd($subjs);

        if($request->curr_id == null) {
            $subjs = Subject::all();
            $selector = null;

            return view('subjects.all_subjects', compact('subjs', 'curriculums', 'selector'));
        }
        
        else if(count($subjs) > 0) {
            $selector = $subjs[0]->curr_id;
            // dd($subjs[0]->curr_id);
            return view('subjects.all_subjects', compact('subjs', 'curriculums', 'selector'));
        }

        else {
            $selector = $request->curr_id;
            return view('subjects.all_subjects', compact('subjs', 'curriculums', 'selector'));
        }
        
    }

    public function edit(Subject $subject)
    {
        $curriculums = Curr::all();
        return view('subjects.edit', compact('curriculums', 'subject'));
    }

    public function update($subject, Request $request)
    {
        Subject::find($subject)->update(request([
            'curr_id',
            'code',
            'description',
            'yearlvl',
            'units',
            'semester'
        ]));

        return response()->json();
    }

    public function getData(Subject $subject)
    {
        return response()->json($subject);
    }

}
