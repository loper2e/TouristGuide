<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\review;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $check = review::where('user_id' ,'=' , Auth::user()->id)->where('place_id' , '=' , $request->input('place_id'))->get();

        if (isset($check[0])) {
            return redirect()->back()->with(['message' => "You Already Reviewed this place" , 'code' => 'error']);
        }

        $reviewData = $request->validate([
            'content' => ['required'],
            'place_id' => ['required' , 'numeric'],
            'user_id' => ['required' , 'numeric'],
            'rate' => ['required' , 'numeric'],
        ]);
        
        $send = review::create([...$reviewData , 'rate' => intval($request->input('rate')) , 'username' => Auth::user()->firstname.' '.Auth::user()->lastname , 'country' => Auth::user()->country , 'userimage' => 'https://randomuser.me/api/portraits/men/50.jpg']);
   
        if ($send) {
            return redirect()->back()->with(['message' => "You succesfully Reviewed, Thank you" , 'code' => 'success']);
        } else {
            return redirect()->back()->with(['message' => "failed, please try again" , 'code' => 'error']);
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

        $reviewData = $request->validate([
            'content' => ['required'],
            'rating' => [],
        ]);

        $review = review::find($id);

        if ($review->update([...$reviewData , 'rate' => intval($request->input('rate'))])) {
            return redirect()->back()->with(['message' => "You succesfully Update Review" , 'code' => 'success']);
        } else {
            return redirect()->back()->with(['message' => "failed, please try again" , 'code' => 'error']);
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
        $review = review::find($id);
        
        if ( $review->delete()) {
            return redirect()->back()->with(['message' => "You succesfully Deleted Review" , 'code' => 'success']);
        }
        
    }
}
