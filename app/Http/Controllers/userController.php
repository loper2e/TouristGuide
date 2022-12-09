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

       function color($num) {
            switch ($num) {
                case 1:
                   return '0D8ABC';
                
                case 2:
                 return '006666';
                 break;
                case 3:
                 return '282102';
                 break;
                case 4:
                 return '464545';
                 break;
                case 5:
                 return '38761d';
                 break;
                default:
                return '464545';
                break;
            }
        };
        $num = rand(1,5);
       $registering =  user::create([ ...$userData,'password' => hash::make($request->input('password')), 'image' => 'https://ui-avatars.com/api/?background='.color($num).'&color=fff&name='.$request->input('username')]);

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
