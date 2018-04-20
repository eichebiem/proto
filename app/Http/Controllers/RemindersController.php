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

    public function update_active($reminder)
    {
        Reminder::find($reminder)->update(
            [
                'status' => '0'
            ]
        );

        return response()->json();
    }

    public function update_inactive($reminder)
    {
        Reminder::find($reminder)->update(
            [
                'status' => '1'
            ]
        );

        return response()->json();
    }

    public function edit(Reminder $reminder)
    {
        return view('reminders.edit', compact('reminder'));
    }

    public function update($reminder, ReminderRequest $request)
    {
        Reminder::find($reminder)->update(request([
            'content'
        ]));

        return redirect('/reminders')->with('message', 'Reminder successfully updated!');
    }

    public function delete($reminder)
    {
        Reminder::destroy($reminder);

        return response()->json();
    }

}
