<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('role')->get();
        return view('users.index', compact('user'));
    }

    public function destroy(User $user)
    {
        // Hapus merchant dan list menu yang berelasi dengan user
        if ($user->merchant) {
            $user->merchant()->delete();
        }

        // Hapus data user
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect('/user')->with('success', 'User and associated merchant and list menus deleted successfully.');
    }
}
