<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
             return redirect()->back();
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
                'firstname' => ['required' ,'max:20' ],
                'lastname' => ['required' , 'max:20' ],
                'username' => ['required' , 'min:8', 'unique:users,username,expect,id' ],
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
        return redirect()->back();
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $checkAdmin = User::where('role', 'admin')->get();
     
        if (count($checkAdmin) == 5 && $request->input('role') == 'admin') {
            return redirect()->back()->with(['message' => "You have reached maximum admins" , 'code' => 'error']);
        } else {
            User::where('id',$id)->update(["role" => $request->input('role')]);
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->back();
    }
}
