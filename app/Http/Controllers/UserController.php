<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function register(){
        return view('users.register');
    }


    //Create New user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User in DataBase
        $user = User::create($formFields);

        // Login
        auth()->login($user);
        
        // Redirect
        return redirect('/')->with('message', 'User created and logged in');
    }
}
