<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use App\Http\Requests\ReminderRequest;

class RemindersController extends Controller
{
    public function create()
    {
        return view('reminders.create');
    }

    public function store(ReminderRequest $request)
    {
        auth()->user()->create_reminder(
            new Reminder(request(['content']))
        );

        return redirect('/reminders')->with('message', 'Reminder is successfully created!');
    }

    public function index()
    {
        $reminders = Reminder::latest()->get();

        return view('reminders.all_reminders', compact('reminders'));
    }

}
