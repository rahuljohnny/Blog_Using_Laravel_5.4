<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
    {
    	$this->middleware('guest', ['except'=>'destroy']);//Only guests are allowed to use the elements of this controller leaving destroy method
    }

    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	//Attempt to authenticate the user
    	if( !auth()->attempt(request(['email','password'])))//If mail/pass doesn't match, TODO::Password must be hardcoded
    	{
	    	//If not,redirect back

    		return back()->withErrors
            ([
                 'message' => 'Please check your credentials and try again!'
            ]);
    	}
    	//If so, sign in then and redirect to home page
    	return redirect()->home();
    }



    public function destroy()
    {
    	auth()->logout();
    	return redirect()->home();
    }
}


