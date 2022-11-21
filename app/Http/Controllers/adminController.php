<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\place;
use App\Models\favoritelist;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard' , ['pages' => 'dashboard' , 'usercount' => User::count() , 'placescount' => place::count() ,'userslistcount' => favoritelist::count()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pages , Request $request)
    {
        if ($pages == 'places') { 
            if ($request->all() && $request->input('type') != null || $request->input('city') != null) {
                $places = place::where('type' , '=' , $request->input('type'))->orWhere('cityname' , '=' , $request->input('city'))->orderBy( 'name' ,$request->input('sort'))->get();
            } else if (($request->input('type') == null && $request->input('city') == null) && $request->input('sort') == 'desc') {
                $places = place::orderBy( 'name' , $request->input('sort'))->get();
            } else {
                $places = place::all();
            }

            $users = array();
            foreach ($places as $place) {
                $finduser = User::find($place['user_id']);
                if ($finduser) {
                    array_push( $users , $finduser);
                }
            }
            return view('admin.dashboard' , ['pages' => $pages , 'places' => $places , 'users' => $users]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
