<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\place;
use App\Models\favoritelist;
use App\Models\review;
use App\Models\support;
use Illuminate\Database\Eloquent\Model;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function counterPercentage(Model $name)
        {
            $now = Carbon::now();
            $yesterday = Carbon::yesterday();
            $beforeyesterday = Carbon::now()->subDay(2);

            $yesterdaycount = $name::whereBetween('created_at', [$beforeyesterday->toDateTimeString() , $yesterday->toDateTimeString()])->count();
            $count = $name::whereBetween('created_at', [$yesterday->toDateTimeString() , $now->toDateTimeString()])->count();

           if ($count == 0) {
              return $result = 0;
           } else {
             $usersdiff = $count - $yesterdaycount ;
              $result = $usersdiff / $count * 100;
              return round($result, 2);
           }
       }

       if (Auth::check()) {
        if (Auth::user()->role == "admin") {

            $now = Carbon::now();
            $yesterday = Carbon::yesterday();

            $data = array(
                'usercount' => User::count(),
                'deffusercount' => counterPercentage(new User),
                'todayusers' => User::whereBetween('created_at', [$yesterday->toDateTimeString() , $now->toDateTimeString()])->count(),
                'placescount' => place::count(),
                'deffplacescount' => counterPercentage(new place),
                'todayplaces' =>  place::whereBetween('created_at', [$yesterday->toDateTimeString() , $now->toDateTimeString()])->count(),
                'favoritelistcount' => favoritelist::count(),
                'defffavoritelistcount' => counterPercentage(new favoritelist),
                'todayfav' => favoritelist::whereBetween('created_at', [$yesterday->toDateTimeString() , $now->toDateTimeString()])->count(),
                'reviewcount' => review::count(),
                'deffreviewcount' => counterPercentage(new review),
                'todayreview' => review::whereBetween('created_at', [$yesterday->toDateTimeString() , $now->toDateTimeString()])->count(),
                'placesdata' =>  place::with('review')->with('favorite')->paginate(5),
            );
            return view('admin.dashboard' , ['pages' => 'dashboard' , 'data' => $data ]);
           } else {
            return redirect('/');
           }
       } else {
        return redirect()->back();
       }


       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pages , Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        if (Auth::user()->role != 'admin') {
            return redirect()->back();
        }

        if ($pages == 'places') { 
            if ($request->all() && $request->input('type') != null || $request->input('city') != null) {
                $places = place::where('type' , '=' , $request->input('type'))->orWhere('cityname' , '=' , $request->input('city'))->orderBy( 'name' ,$request->input('sort'))->get();
            } else if (($request->input('type') == null && $request->input('city') == null) && $request->input('sort') == 'desc') {
                $places = place::orderBy( 'name' , $request->input('sort'))->get();
            } else {
                $places = place::all();
            }

            return view('admin.dashboard' , ['pages' => $pages , 'places' => $places]);
        } else if ($pages == 'users') {
            $users = user::where('role' , '=' , 'user')->orderBy( 'id' ,'desc')->paginate(10);
            $admins = user::where('role' , '=' , 'admin')->get();
            return view('admin.dashboard' , ['pages' => $pages , 'users' => $users , 'admins' => $admins]);
        } else if ($pages == 'support'){
            $messages = support::orderBy( 'id' ,'desc')->paginate(10);
            return view('admin.dashboard' , ['pages' => $pages , 'messages' => $messages]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
