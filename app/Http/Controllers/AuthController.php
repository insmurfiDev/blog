<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'string|min:6',
            'remember' => 'nullable|boolean'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], data_get($data, 'remember', false))) {
            return redirect()->route('home');
        }
        return back()->with('invalid_auth', true);
    }

    public function loginView()
    {
        return view('login');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|unique:users,email|required',
            'password' => 'confirmed|string|min:6',
            'name' => 'required|string'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::query()->create($data);

        return redirect()->route('login')->with('registered', true);
    }

    public function signupView()
    {
        return view('signup');
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
