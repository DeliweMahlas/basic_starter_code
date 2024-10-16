@extends('layouts')
@section('title', 'Agent Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>Agent Dashboard</h1>
        <p>Welcome, {{ $agent->name }}!</p>
    </div>

    <!-- Agent Details Section -->
    <div class="agent-details">
        <h3>Your Details</h3>
        <div class="detail-item">
            <strong>Name:</strong> <span>{{ $agent->name }}</span>
        </div>
        <div class="detail-item">
            <strong>Surname:</strong> <span>{{ $agent->surname }}</span>
        </div>
        <div class="detail-item">
            <strong>Address:</strong> <span>{{ $agent->address }}</span>
        </div>
        <div class="detail-item">
            <strong>Email:</strong> <span>{{ $agent->email }}</span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="dashboard-actions">
        <a href="{{ route('agent.edit') }}" class="btn btn-primary mt-3">Update Details</a>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

@endsection

<style>
    /* Dashboard Container */
    .dashboard-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f8f9fa;
        padding: 20px;
    }

    /* Dashboard Header */
    .dashboard-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        color: #343a40;
    }

    .dashboard-header p {
        font-size: 1.2rem;
        color: #6c757d;
    }

    /* Agent Details */
    .agent-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        text-align: left;
    }

    .agent-details h3 {
        font-size: 1.5rem;
        color: #007bff;
        margin-bottom: 20px;
        text-align: center;
    }

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

    /* Dashboard Actions */
    .dashboard-actions {
        margin-top: 30px;
        display: flex;
        gap: 15px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    /* Button Hover Effects */
    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Media Query for Smaller Screens */
    @media (max-width: 768px) {
        .agent-details {
            width: 90%;
        }

        .dashboard-header h1 {
            font-size: 2rem;
        }

        .dashboard-header p {
            font-size: 1rem;
        }
    }
</style>
