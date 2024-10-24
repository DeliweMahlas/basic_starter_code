<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;

class AgentController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user, which should be a single agent
        $agent = Auth::user();

        // Pass the agent to the view
        return view('dashboard.agent', compact('agent'));
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
         return redirect()->route('dashboard.agent')->with('success', 'Your details have been updated.');
     }
     public function rate(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:1000',
    ]);

    $agent = User::findOrFail($id); // Find the agent

    // Create a new rating for the agent (assuming you have a Rating model)
    Rating::create([
        'user_id' => Auth::id(),
        'agent_id' => $agent->id,
        'rating' => $request->input('rating'),
        'review' => $request->input('review'),
    ]);

    return redirect()->back()->with('success', 'Your rating has been submitted.');
}

public function getAgents()
{
    // Retrieve all users where the role is 'agent'
    $agents = User::where('role', 'agent')->get();

    // Pass the agents to the view
    return view('dashboard.user', ['agents' => $agents, 'user' => Auth::user()]);
}

}

