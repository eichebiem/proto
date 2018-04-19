<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reminder;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $reminders = Reminder::where('status', 1)->get();

        return view('dashboard.home', compact('reminders'));
    }

}
