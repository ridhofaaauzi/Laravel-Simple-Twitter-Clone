<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store()
    {
        // validate
        $validated = request()->validate([
            "name" => "required|min:3|max:40",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
        ]);

        // create user
        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
        ]);

        // redirect
        return redirect()->route("dashboard")->with("success", "Account created successfully");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function authenticate()
    {
        // validate
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        //  attempt authentication
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            // redirect
            return redirect()->route("dashboard")->with("success", "Login is successfully");
        }

        // redirect
        return redirect()->route("login")->withErrors([
            "email" => "No matching user found with the provided email and password",
        ]);
    }

    public function logout()
    {
        Auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("dashboard")->with("success", "Logout is successfully");
    }
}