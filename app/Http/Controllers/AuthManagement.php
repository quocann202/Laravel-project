<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManagement extends Controller
{
    // Show login page
    public function login()
    {
        return view("login");
    }

    // Handle login form submission
    public function loginPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("homepage"));
        }

        return redirect()->route("login")->with("error", "Invalid email or password!");
    }

    // Show registration page
    public function registration()
    {
        return view("register");
    }

    // Handle registration form submission
    public function registrationPost(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);

        if (!$user) {
            return redirect()->route("register")->with("error", "Registration failed. Please try again.");
        }

        return redirect()->route("login")->with("success", "Registration successful! Please log in.");
    }

    // Handle logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("login");
    }
}
