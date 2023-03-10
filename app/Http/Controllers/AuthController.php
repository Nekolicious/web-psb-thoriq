<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('dashboard.admin', ['data' => $users]);
    }

    // Login Page
    public function adminlogin()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.login');
        }
        
    }

    // Login Action
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['invalid' => 'Username atau password salah.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
