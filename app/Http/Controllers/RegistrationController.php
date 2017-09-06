<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)//todo Declaring RegistrationFor type object
    {
        $form->persist();    	//Calling the persist() func
        //flash message like toast
        //session('message','here is the default message');
        session()->flash('message','Welcome to blogajaira!');
        //session(['message'=>'Its the another']);
    	return redirect()->home();        //Redirect to home
    }
}
