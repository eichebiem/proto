<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store()
    {
        if(auth()->attempt(request(['username', 'password']))){
            return redirect('/home');
        }

        return back()->with('message', 'Invalid login details. Please try again.');
    }

}
