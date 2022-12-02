<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\place;
use App\Models\review;
use App\Models\favoritelist;

class placeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->all() && $request->input('type') != null || $request->input('city') != null) {
            $places = place::where('type' , '=' , $request->input('type'))->orWhere('cityname' , '=' , $request->input('city'))->orderBy( 'name' ,$request->input('sort'))->get();
        } else if (($request->input('type') == null && $request->input('city') == null) && $request->input('sort') == 'desc') {
            $places = place::orderBy( 'name' , $request->input('sort'))->get();
        } else {
            $places = place::all();
        }

      
       $favoritelists = array();
       if (Auth::check()) {
            $lists = favoritelist::where('user_id' , '=' , Auth::user()->id)->get();
            foreach ($lists as $list) {
                array_push($favoritelists , $list['place_id']);
            }
        };

    return view('places.index' , ['places' =>  $places , 'favoritelists' => $favoritelists]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role = 'admin') {
                return view('places.placeform');
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $placeData = $request->validate([
            'name' => ['required'],
            'cityname' => ['required'],
            'type' => ['required'],
            'mainimage' => ['required'],
            'image1' => [],
            'image2' => [],
            'image3' => [],
            'open_time' => ['required' , 'date_format:H:i'],
            'close_time' => ['required' , 'date_format:H:i'],
            'details' => ['required'],
        ]);

        if (place::create([...$placeData, 'user_name' => Auth::user()->username])) {
            return redirect('admin/places')->with(['message' => "new place had been added to database" , 'code' => 'success']);
        } else {
            return redirect('admin/places')->with(['message' => "failed, please try again" , 'code' => 'error']);
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



        $favoritelist = null;
        $userReview = null ;
       if (Auth::check()) {
            $lists = favoritelist::where('user_id' , '=' , Auth::user()->id)->where('place_id' , '=' , $id)->get();

            if (isset($lists[0])) {
               $favoritelist = $lists[0];
            }

            $userReviews = review::where('user_id' ,'=' , Auth::user()->id)->where('place_id' , '=' , $id)->get();
            
            if (isset($userReviews[0])) {
                $userReview = $userReviews[0];
            }
        
            $reviews = review::where('place_id' , '=' , $id)->where('user_id' , '!=' , Auth::user()->id)->get();
        };

        $reviews = review::where('place_id' , '=' , $id)->get();
        $place = place::find($id);
        return view('places.placeshow' , ['place' => $place , 'favoritelists' => $favoritelist , 'reviews' => $reviews , 'userReview' => $userReview] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = place::find($id);
        return view('places.placeform' , ['place' => $place] );
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
        $placeData = $request->validate([
            'name' => ['required'],
            'cityname' => ['required'],
            'type' => ['required'],
            'mainimage' => ['required'],
            'image1' => [],
            'image2' => [],
            'image3' => [],
            'details' => ['required'],
        ]);

        $place = place::find($id);
        
        if ($place->update($placeData)) {
            return redirect('admin/places')->with(['message' => " place had been updated " , 'code' => 'success']);
        } else {
            return redirect('admin/places')->with(['message' => "failed, please try again" , 'code' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = place::find($id);
        $place->delete();

        return redirect('admin/places')->with(['message' => "the place had been deleted " , 'code' => 'success']);
    }
}
