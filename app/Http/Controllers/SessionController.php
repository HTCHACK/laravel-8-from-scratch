<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','Good Bye');
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attributes))
        {
            return redirect('/')->with('success','Welcome Back!');
        }

        return back()->withErrors(['email'=>'Your provided credintails coud not be verified']);
    }
}
