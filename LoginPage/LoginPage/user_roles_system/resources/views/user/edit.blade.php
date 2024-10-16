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
    <form method="POST" action="{{ route('agent.update') }}">
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

<style>
.dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
}

form {
    width: 50%;
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

button {
    width: 100%;
}
</style>
