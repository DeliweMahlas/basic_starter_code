<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    
            // Get the currently authenticated user, which should be a single agent
            $user = Auth::user();
    
            // Pass the agent to the view
            return view('dashboard.user', compact('user'));
        }
         // Show the update form for the agent
         public function edit()
         {
             $agent = Auth::user();  // Get the currently authenticated agent
             return view('agent.edit', compact('agent'));  // Return the form view with the agent's current details
         }
     
         // Handle the form submission and update the agent's details
         public function update(Request $request)
         {
             // Validate the incoming request data
             $request->validate([
                 'name' => 'required|string|max:255',
                 'surname' => 'required|string|max:255',
                 'address' => 'required|string|max:255',
             ]);
     
             // Get the currently authenticated agent
             $agent = Auth::user();
     
             $agent->name = $request->input('name');
             $agent->surname = $request->input('surname');
             $agent->address = $request->input('address');
             $agent->save(); // Save the changes to the database
     
             // Redirect back to the agent dashboard with a success message
             return redirect()->route('dashboard.user')->with('success', 'Your details have been updated.');
         }
    }
    
    

