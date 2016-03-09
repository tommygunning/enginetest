<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id )->first();
        return view('home', ['profile'=>$profile] );
    }
}
