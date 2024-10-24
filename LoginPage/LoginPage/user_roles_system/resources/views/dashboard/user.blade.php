<?php
   use App\Models\User;
  $agents = User::where('role', 'agent')->where('is_approved', true)->get();
?>
@extends('layouts')
@section('title', 'User Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Dashboard Title -->
    <h1>User Dashboard</h1>
    <p>Welcome, {{ $user->name }}!</p>

    <!-- User Details Section -->
    <div class="flex-container">
    <div class="agent-details">
        <h3>Your Details</h3>
        <div class="detail-item">
            <strong>Name:</strong> <span>{{ $user->name }}</span>
        </div>
        <div class="detail-item">
            <strong>Surname:</strong> <span>{{ $user->surname }}</span>
        </div>
        <div class="detail-item">
            <strong>Address:</strong> <span>{{ $user->address }}</span>
        </div>
        <div class="detail-item">
            <strong>Email:</strong> <span>{{ $user->email }}</span>
        </div>
    </div>
    <div class="user-details">
    <h3>Agents Available</h3>
            @if($agents->isNotEmpty())
                @foreach($agents as $agent)
                <!-- Each Agent Container -->
                <div class="agent-card">
                    <div class="agent-info">
                        <h4>{{ $agent->name }} {{ $agent->surname }}</h4>
                        <p>Email: {{ $agent->email }}</p>
                        <p>Address: {{ $agent->address }}</p>
                    </div>

                    <!-- Buttons inside the agent card -->
                    <div class="agent-actions">
        </div><a href="{{ route('agent.ratings', $agent->id) }}" class="btn btn-secondary mt-3">View Ratings</a>
<!-- Rate This Agent Button -->
<button type="button" class="btn btn-success mt-3" onclick="toggleRatingForm('{{ $agent->id }}')">Rate This Agent</button>

<!-- Hidden Rating Form -->
<form id="rating-form-{{ $agent->id }}" action="{{ route('rate.agent', $agent->id) }}" method="POST" class="rating-form" style="display:none;">
    @csrf
    <label for="rating">Rate this agent:</label>
    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
    <select name="rating" id="rating" class="form-control">
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Good</option>
        <option value="4">4 - Very Good</option>
        <option value="5">5 - Excellent</option>
    </select>

    <label for="review">Leave a review:</label>
    <textarea name="review" id="review" class="form-control" rows="3" placeholder="Write your review here..."></textarea>

    <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
</form>
</div>
</div>
@endforeach
@else
<p>No agents available at the moment.</p>
@endif
</div>
</div>
    <!-- Update and Logout Buttons -->
    <div class="dashboard-actions">
        <a href="{{ route('agent.edit') }}" class="btn btn-primary mt-3">Update Details</a>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>
<script>
    function toggleRatingForm(agentId) {
        const form = document.getElementById(`rating-form-${agentId}`);
        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>

@endsection

<!-- Custom Dashboard CSS -->
<style>
    /* Main Dashboard Container */
    /* Main Dashboard Container */
.dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f8f9fa;
    padding: 20px;
}
/* Button Styling */
.btn-success {
    background-color: #28a745;
    color: white;
}

.btn-success:hover {
    background-color: #218838;
}

/* Hide the rating form initially */
.rating-form {
    display: none;
    margin-top: 15px;
}

/* Dashboard Title */
.dashboard-container h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #343a40;
}

.dashboard-container p {
    font-size: 1.2rem;
    color: #6c757d;
}
/* Style for the rating form container */
.rating-form {
    background-color: #f8f9fa; /* Light background for the form */
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
    margin-top: 20px;
    width: 100%;
    max-width: 400px; /* Adjust form width */
}

/* Label Styling */
.rating-form label {
    font-size: 1.1rem;
    color: #343a40; /* Dark text color */
    display: block;
    margin-bottom: 5px;
}

/* Select Dropdown Styling */
.rating-form select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 1rem;
    margin-bottom: 15px;
    color: #495057; /* Gray text */
    background-color: #fff;
}

/* Textarea Styling */
.rating-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 1rem;
    color: #495057;
    background-color: #fff;
    margin-bottom: 15px;
    resize: vertical; /* Allow vertical resizing */
}

/* Submit Button Styling */
.rating-form button[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
}

/* Submit Button Hover Effect */
.rating-form button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Make sure the form is fully responsive */
@media (max-width: 768px) {
    .rating-form {
        width: 100%; /* Full width on smaller screens */
        max-width: 100%;
    }
}

/* Flex container for user and agents section */
.flex-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    max-width: 1200px; /* Adjust this to change the max width */
    gap: 20px;
}

/* User Details and Agents Section */
.user-details, .agent-details {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 48%; /* Adjust width for side-by-side layout */
    text-align: left;
}

/* User and Agent Titles */
.user-details h3, .agent-details h3 {
    font-size: 1.5rem;
    color: #007bff;
    margin-bottom: 20px;
    text-align: center;
}

/* Detail items */
.detail-item {
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.detail-item strong {
    color: #343a40;
}

.detail-item span {
    color: #6c757d;
    margin-left: 10px;
}

/* Dashboard Actions Section */
.dashboard-actions {
    margin-top: 30px;
    display: flex;
    gap: 15px;
}

/* Button Styling */
.btn {
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    text-transform: uppercase;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

/* Button Hover Effects */
.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Responsiveness for Smaller Screens */
@media (max-width: 768px) {
    .flex-container {
        flex-direction: column; /* Stack on smaller screens */
        align-items: center;
    }

    .user-details, .agent-details {
        width: 90%; /* Adjust to full width on small screens */
    }
}
/* Main Dashboard Container */
.dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background-color: #f8f9fa;
}

/* User and Agent Section Layout */
.flex-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    max-width: 1200px;
    gap: 20px;
}

/* Agent and User Details */
.user-details, .agent-details {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 48%; /* Adjust to make side-by-side */
}

/* Agent Card Styling */
.agent-card {
    background-color: #f1f1f1;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

/* Agent Info within the card */
.agent-info h4 {
    margin-bottom: 10px;
    color: #007bff;
}

.agent-info p {
    color: #6c757d;
}

/* Agent Actions (buttons) */
.agent-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.agent-actions .btn {
    padding: 10px 20px;
    font-size: 1rem;
    text-transform: uppercase;
    border-radius: 5px;
}

/* Rating Form Styling */
.rating-form {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    display: none;
}

.rating-form label {
    font-size: 1.1rem;
    color: #343a40;
    display: block;
    margin-bottom: 5px;
}

/* Responsive layout for smaller screens */
@media (max-width: 768px) {
    .flex-container {
        flex-direction: column;
    }

    .user-details, .agent-details {
        width: 100%;
    }
}

</style>
