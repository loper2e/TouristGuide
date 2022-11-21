<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\favoritelist;
use App\Models\place;

class favoritelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $favoritelists = favoritelist::where('user_id', '=' , Auth::user()->id)->get();
        $places = array();
        $favoriteid = array();

        foreach ($favoritelists as $favoritelist) {
            
            if ($request->all() && $request->input('type') != null || $request->input('city') != null) {
                $place = place::find($favoritelist['place_id'])->where('type' , '=' , $request->input('type'))->orWhere('cityname' , '=' , $request->input('city'))->orderBy( 'name' ,$request->input('sort'))->get();
               if (isset($place[0])) {
                    array_push($places , $place[0]);  
               }    
                array_push($favoriteid , $favoritelist['place_id']);
            } else if (($request->input('type') == null && $request->input('city') == null) && $request->input('sort') == 'desc') {
                $place = place::find($favoritelist['place_id'])->orderBy( 'name' , $request->input('sort'))->get();
                if (isset($place[0])) {
                    array_push($places , $place[0]);  
               }  
                array_push($favoriteid , $favoritelist['place_id']);
            } else {
                $place = place::find($favoritelist['place_id']);
                array_push($places , $place);
                array_push($favoriteid , $favoritelist['place_id']);
            }

        }


        return view('places.index' , ['places' =>  $places , 'favoritelists' => $favoriteid]);
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
   
        if(favoritelist::create($request->all())){
            return redirect()->back();
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $list = favoritelist::where('place_id' , '=' , $id)->where('user_id' , '=' , Auth::user()->id);
        $list->delete();
        
        return redirect()->back();
        
    }
}
