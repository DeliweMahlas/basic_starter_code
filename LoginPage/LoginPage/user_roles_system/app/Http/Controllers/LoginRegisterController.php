<?php

namespace App\Http\Controllers;


use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{
    function login()
    {
       
        return view('login');
    }

    function registration()
    {
        
        return view('register');
    }


    function loginPost(Request $request)
    {
        $request ->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            // Check the user's role and redirect accordingly
            if ($user->role === 'agent') {
                return redirect()->route('dashboard.agent');
            }  elseif ($user->role === 'user') {
                return redirect()->route('dashboard.user'); // Route for regular users
            } else {
                return redirect()->route('login')->with('error', 'User role not found.');
            }
            
        }
        return redirect(route('login'))->with("error","Incorrect Login Details");
    }

    function registrationPost(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data['name'] = $request-> name;
        $data['surname'] = $request-> surname;
        $data['address'] = $request-> address;
        $data['email'] = $request-> email;
        $data['password'] = Hash::make($request-> password);
        $data['role'] = $request-> role;
       

        if(!user::create($data))
        {
            return redirect(route('register'))->with("error","Registration failed, try again");
        }
        return redirect(route('login'))->with("success","Successful Registered");
    }

    function logout()
    {
        Auth::logout();
    return redirect('/'); // Redirect to home or login page
    }
}
