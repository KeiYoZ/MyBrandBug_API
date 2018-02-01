<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Resources\RegistrationResource;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterRequest $register_request)
    {
        $new_user = new User;
        $new_user->fname = $register_request['fname'];
        $new_user->lname = $register_request['lname'];
        $new_user->email = $register_request['email'];
        $new_user->password = bcrypt($register_request['password']);
        $new_user->birthday = $register_request['birthday'];
        $new_user->gender = $register_request['gender'];
        $new_user->save();

        return new RegistrationResource($new_user);
    }
}
