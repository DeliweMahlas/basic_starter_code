@extends('layouts')

@section('title', 'Update Agent Details')

@section('content')
<div class="dashboard-container">
    <h1>Update Your Details</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Update Form -->
    <form method="POST" action="{{ route('agent.update') }}" class="update-form">
        @csrf

        <!-- Name Input -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $agent->name }}" required>
        </div>

        <!-- Surname Input -->
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ $agent->surname }}" required>
        </div>

        <!-- Address Input -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $agent->address }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

<!-- Custom CSS -->
<style>
.dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    padding: 20px;
    background-color: #f8f9fa;
}

h1 {
    font-size: 2.5rem;
    color: #343a40;
    margin-bottom: 20px;
    text-align: center;
}

.update-form {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    font-weight: bold;
    color: #495057;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ced4da;
    background-color: #f8f9fa;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838;
}

/* Validation Errors Styling */
.alert-danger {
    width: 100%;
    max-width: 600px;
    margin-bottom: 20px;
}

.alert-danger ul {
    margin: 0;
    padding-left: 20px;
}

.alert-danger li {
    list-style-type: disc;
}
</style>
