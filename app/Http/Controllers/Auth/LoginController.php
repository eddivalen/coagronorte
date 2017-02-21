<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Validator;
use JWTAuth, Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;
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
    /**
     * Permite el inicio de sesion al usuario
     * @param  LoginRequest $request request del usuario
     * @return Response                JWT
     */
     public function login(LoginRequest $request) {
     
    }
    /**
     * Permite el logout, invalida el token que llega por request
     * @return Response ok
     */
    public function logout() {



    }
}
