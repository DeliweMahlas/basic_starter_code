<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'rating' => 'required|integer|between:1,5',
        'review' => 'nullable|string',
    ]);

    // Check if the user has already rated this agent (optional step)
    $existingRating = Rating::where('user_id', Auth::id())
                            ->where('agent_id', $request->agent_id)
                            ->first();

    if ($existingRating) {
        // Update the existing rating
        $existingRating->update([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);
    } else {
        // Save the rating to the database
        Rating::create([
            'user_id' => Auth::id(),
            'agent_id' => $request->agent_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);
    }

    return redirect()->back()->with('success', 'Rating submitted successfully.');
}


    public function showRatings($agentId)
    {
        $agent = User::where('role', 'agent')->where('id', $agentId)->firstOrFail();

        // Get the ratings for the agent
        $ratings = Rating::where('agent_id', $agentId)->with('user')->get();
    
        // Pass both the agent and the ratings to the view
        return view('agent.ratings', [
            'agent' => $agent,
            'ratings' => $ratings
        ]);
    }
}

