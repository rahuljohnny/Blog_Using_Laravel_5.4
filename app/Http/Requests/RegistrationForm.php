<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\WelcomeAgain;

use Illuminate\Support\Facades\Mail;


class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
            //
        ];
    }

    public function persist()
    {
        //Create and save the user
        //array of request([]) and only([]) used in here are identical
        $user = User::create(
            $this->only(['name','email','password'])
        );

        $user->password = \Hash::make('password'); //TODO: VVI: So here We can update/edit any values,received from form/other source

        /*
        $options=['cost'=>11];
        $user->password = password_hash('password',PASSWORD_BCRYPT, $options);

        $user->password = password_hash('password', PASSWORD_DEFAULT);

        */


        $user->save(); //TODO: After editing,saving is a must

        //Sign them in
        auth()->login($user);
        //TODO Then send a welcome m,essage to the new user
        // \Mail::to($user)->send(new Welcome($user));//tODO CNU Using mail facade
        \Mail::to($user)->send(new WelcomeAgain($user));//tODO CNU Using mail facade
        //TODO after setting up all mail functions we need to run a command-php artisan config:cache
    }
}
