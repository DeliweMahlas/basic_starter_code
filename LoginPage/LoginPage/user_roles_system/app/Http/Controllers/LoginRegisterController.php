<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{
    // Show login form
    public function login()
    {
        return view('login');
    }

    // Show registration form
    public function registration()
    {
        return view('register');
    }

    // Handle login POST request
    public function loginPost(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Get the credentials
        $credentials = $request->only('email', 'password');
    
        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user is an agent and is approved
            if ($user->role === 'agent' && !$user->is_approved) {
                // Log the user out immediately
                Auth::logout();
                return redirect()->back()->with(['error' => 'Your account has not been approved by an admin yet.']);
            }
    
            // Redirect based on user role
            if ($user->role === 'agent') {
                return redirect()->route('dashboard.agent');
            } elseif ($user->role === 'user') {
                return redirect()->route('dashboard.user');
            }elseif($user->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }
             else {
                return redirect()->route('login')->withErrors(['error' => 'User role not found.']);
            }
        }
    
        // If login attempt fails
        return redirect()->back()->withErrors(['error' => 'Incorrect login details.']);
    }
    
    // Handle registration POST request
    public function registrationPost(Request $request)
    {
        // Validate registration inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:agent,user,admin',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Prepare user data for creation
        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        // Attempt to create the user
        if (User::create($data)) {
            return redirect()->route('login')->with('success', 'Successfully registered. You can now log in.');
        } else {
            return redirect()->route('register')->with('error', 'Registration failed, please try again.');
        }
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to the home or login page
    }
}
