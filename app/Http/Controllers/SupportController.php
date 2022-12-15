<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('support.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required' , 'email'],
            'message' => ['required'],
        ]);

        if (Auth::check()) {
            $username = Auth::user()->username;
        } else {
            $username = 'guest';
        }

        support::create([...$data , 'username' => $username]);

        return redirect()->back()->with(['message' => "You succesfully sent message, Thank you" , 'code' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $support = support::find($id);
        if ($support->update(['readed' => true])) {
            return redirect()->back();
        } else {
            return redirect()->back()->with(['message' => "failed, please try again" , 'code' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $support = support::find($id);
        if ($support->delete()) {
            return redirect()->back()->with(['message' => "You succesfully deleted " , 'code' => 'success']);
        } else {
            return redirect()->back()->with(['message' => "failed, please try again" , 'code' => 'error']);
        }
    }
}
