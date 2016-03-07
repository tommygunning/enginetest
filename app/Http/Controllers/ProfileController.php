<?php
/**
 * Controller for visitors creating profiles
 */
namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show the profile creation form.
     *
     * @return Response
     */
    
    public function create( Request $request )
    {
        $user_id = $request->user()->id;
        $profile = Profile::where('user_id', $user_id )->first();
        if( !empty( $profile ) )  return redirect('home')->with('status', 'Profile already created!');
        return view('profile');
    }
    
    public function add( Request $request )
    {
        $user_id = $request->user()->id;
        $profile = Profile::where('user_id', $user_id )->first();
        if( !empty( $profile ) )  return redirect('home')->with('status', 'Profile already created!');
        $valid = Validator::make($request->all(), [
            'username' => array('Regex:/^[\w\-! \/@\.:]+$/','Regex:/[a-zA-Z]/','required','unique:profiles','max:80'.'min:3'),
            'description' => 'required|max:500|min:10',
            ]);

        if ($valid->fails()) {
            return redirect('/profile/create')
            ->withInput()
            ->withErrors($valid);
        }
       
        $prof = new Profile;
        $prof->user_id = $user_id;
        $prof->username = $request->username;
        $prof->description = $request->description;
        $prof->status = 1; /* we set the status to active */
        if( $prof->save() ){
            return redirect('home')->with('status', 'Profile was successfully created!');
        }
        $request->session()->flash('status', 'Could not save profile');
        return view('profile');
    }
}