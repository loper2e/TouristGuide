<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class userController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::check()) {
            return redirect('/');
        }

        if (!empty($request->input('email')) && !empty($request->input('password'))) {

           $values = $request->only('email' , 'password');
           if (Auth::attempt($values)) {
             return redirect(back()->getTargetUrl());
           } else {
             return view('auth.login' , ['error' => 'Wrong Email or Password']);
           }

        } 

        return view('auth.login');


    }


    public function create()
    {
        return view('auth.register');
    }
   
    public function store(Request $request)
    {

        $userData = $request->validate(
            [
                'firstname' => ['required' , 'max:20' ],
                'lastname' => ['required' , 'max:20' ],
                'username' => ['required' , 'unique:users,username,expect,id' ],
                'email' => ['required' , 'email' , 'unique:users,email,expect,id' ],
                'password' => ['required' , 'min:8'  ],
                'gender' => ['required'],
                'country' => ['required'],
                'confirmPassword' => ['required' , 'same:password'],
            ]
        );
        
       $registering =  user::create([ ...$userData,'password' => hash::make($request->input('password'))]);

        if($registering) {
            $values = $request->only('email' , 'password');
            Auth::attempt($values);
            return redirect('/')->with(['message' => "User has been Created" , 'code' => 'success'] );
        }

    }


    public function show($id)
    {
        Auth::logout();
        return redirect('/');
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->back();
    }
}
