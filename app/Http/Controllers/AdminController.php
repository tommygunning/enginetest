<?php
/**
 * Controller for admins
 */
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( )
    {
        $this->user = Auth::user();
    }
    
    /**
     * Returns list of active profiles
     *
     * @param $request A Request object
     * @return Response
     */
    public function index( Request $request )
    {
        if( empty( $this->user->admin )  ) {
            return redirect('login')->with('status', 'Not authorized!');
        }
     
       $profiles = Profile::with('user')->orderBy('created_at', 'asc')->where('status', 1)->get();
        return view( 'list', ['profiles'=>$profiles] );
    }
    
    /**
     *  View a profile
     *
     * @param $id The profile identifier
     * @return Response
     */
    public function view( $id )
    {
        if( empty( $this->user->admin )  ) {
            return redirect('login')->with('status', 'Not authorized!');
        }
     
       $profile = Profile::with('user')->find( $id );
       if( empty( $profile ) ) return redirect('home')->with('status', 'No such profile!');
        return view( 'view', [ 'profile' => $profile ] );
    }
    
}