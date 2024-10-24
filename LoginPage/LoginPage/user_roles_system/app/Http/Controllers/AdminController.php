<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show admin dashboard with agents
    public function index()
    {
        // Fetch all users with role 'agent' and their approval status
        $agents = User::where('role', 'agent')->get();

        return view('admin.dashboard', compact('agents'));
    }

    // Approve an agent
    public function approveAgent($id)
    {
        $agent = User::findOrFail($id);
        $agent->is_approved = true;
        $agent->save();

        return redirect()->route('admin.dashboard')->with('success', 'Agent approved successfully');
    }

    // Disapprove an agent
    public function disapproveAgent($id)
    {
        $agent = User::findOrFail($id);
        $agent->is_approved = false;
        $agent->save();

        return redirect()->route('admin.dashboard')->with('success', 'Agent disapproved successfully');
    }
}
