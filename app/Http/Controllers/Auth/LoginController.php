<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AccessTokenResource;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\ApiConsumer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return $this->createAccessToken($request, Auth::user()->email, 'password');
        }
    }

    public function logout(){
        $access_token = Auth::user()->token();
        $access_token->revoke();

        return "User Successfully logout!";
    }

    private function createAccessToken(Request $request, $email, $grant_type){
        AccessTokenResource::withoutWrapping();

        $post_data = [
            'username'      => $email,
            'password'      => $request->password,
            'client_id'     => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => $grant_type
        ];

        $post_response = app()->make('apiconsumer')->post('/oauth/token', $post_data);

        if ($post_response){
            $token_data = json_decode($post_response->getContent(), true);
            $request->merge($token_data);
            
            return new AccessTokenResource($request);
        }
    }
}
