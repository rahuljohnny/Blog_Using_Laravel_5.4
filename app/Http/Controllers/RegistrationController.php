<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Hashing\Hasher;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
    	//validate the user

    	$this->validate(request(), 
		[
    		'name' => 'required',
    		'email'=> 'required|email',
    		'password'=> 'required|confirmed'
		]);


    	//Create and save the user
    	$user = User::create(request(['name','email','password']));

        $user->password = \Hash::make('password'); //TODO: VVI: So here We can update/edit any values,received from form/other source

        /*
        $options=['cost'=>11];
        $user->password = password_hash('password',PASSWORD_BCRYPT, $options);

        $user->password = password_hash('password', PASSWORD_DEFAULT);

        */


        $user->save(); //TODO: After editing,saving is a must

    	//Sign them in
    	auth()->login($user);

    	//Redirect to home
    	return redirect()->home();
    }
}
