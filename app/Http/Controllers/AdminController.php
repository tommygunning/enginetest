<?php
/**
 * Controller for admins
 */
namespace App\Http\Controllers;

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
    }
    
    public function index( Request $request )
    {
        $user = $request->user();
       if( empty( $user['admin']  )) return redirect('home')->with('status', 'Not authorized!');
       $tasks = Profile::orderBy('created_at', 'asc')->get();

    }
    
}