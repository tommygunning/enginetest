<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::with('user')->orderBy('created_at', 'asc')->where('status', 1)->get();
        $this->output( $profiles );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::with('user')->find( $id );
       if( empty( $profile ) ) $this->error( 'No such profile!');
       $this->output( $profile );
    }

   
   private function error( $msg ){
        exit( json_encode( ['error' => $msg ] ) );
   }
   
     private function output( $msg ){
        exit( json_encode( ['data' => $msg, 'error' => '' ] ) );
   }
}
