@extends('layouts')
@section('title', 'User Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Dashboard Title -->
    <h1>User Dashboard</h1>
    <p>Welcome, {{ $user->name }}!</p>

    <!-- User Details Section -->
    <div class="user-details">
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

    <!-- Update and Logout Buttons -->
    <div class="dashboard-actions">
        <a href="{{ route('agent.edit') }}" class="btn btn-primary mt-3">Update Details</a>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>
@endsection

<!-- Custom Dashboard CSS -->
<style>
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

    /* User Details Section */
    .user-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        text-align: left;
    }

    .user-details h3 {
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
        .dashboard-container h1 {
            font-size: 2rem;
        }

        .dashboard-container p {
            font-size: 1rem;
        }

        .user-details {
            width: 90%;
        }
    }
</style>
