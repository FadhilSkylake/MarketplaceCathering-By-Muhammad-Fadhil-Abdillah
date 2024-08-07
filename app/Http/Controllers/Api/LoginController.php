<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string|min:6'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get credentials from request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user and get the token
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        // Get authenticated user
        $user = Auth::user();

        // Determine the URL based on user role
        $url = '';
        if ($user->role_id == 1) {
            $url = '/dashboard'; // Redirect dashboard
        } elseif ($user->role_id == 2) {
            $url = '/dashboard'; // Redirect dashboard
        } elseif ($user->role_id == 3) {
            $url = '/dashboard'; // Redirect dashboard
        }

        // Return the token and user info on successful authentication
        return response()->json([
            'success' => true,
            'user'    => $user,
            'token'   => $token,
            'url'     => $url
        ], 200);
    }
}
