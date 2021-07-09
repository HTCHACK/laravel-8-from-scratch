<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' =>'required|min:3|max:15',
            'username'=>'required|min:5|max:25|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>['required','min:7','max:255'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);
        $user = auth()->login($user);

        return redirect('/')->with('success','Your account has been created');
    }
}
