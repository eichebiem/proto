<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AcadYear;

class AcadYearController extends Controller
{
    public function index()
    {
        $acadyears = AcadYear::orderBy('year')->orderBy('semester')->get();

        return view('dashboard.acadyear', compact('acadyears'));
    }

    public function store(Request $r)
    {
        $year = new AcadYear;
        $year->year = $r->year;
        $year->semester = $r->semester;
        $year->save();

        return response()->json();
    }

    public function update($acadyear)
    {
        AcadYear::where('status', 1)->update([
            'status' => 0
        ]);

        AcadYear::where('id', $acadyear)->update([
            'status' => 1
        ]);

        return response()->json();
    }

}
