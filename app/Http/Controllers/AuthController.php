<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showRegisterForm()
    {
        $role = Role::all();
        return view('login.register', compact('role'));
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
