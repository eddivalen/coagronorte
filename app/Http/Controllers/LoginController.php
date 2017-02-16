<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Validator;
use JWTAuth, Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\JsonResponse;


class LoginController extends Controller
{
	/**
	 * Permite el inicio de sesion al usuario
	 * @param  LoginRequest $request request del usuario
	 * @return Response                JWT
	 */
    public function login(LoginRequest $request) {
       
        // grab credentials from the request
        $credentials = $request->only('correo_electronico', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * Permite el logout, invalida el token que llega por request
     * @return Response ok
     */
    public function logout() {

        JWTAuth::parseToken()->invalidate();

        return response()->json(['ok' => 'logout'], 200);

    }
}
