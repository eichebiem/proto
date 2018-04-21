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

}
