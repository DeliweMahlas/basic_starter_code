@extends('layouts')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1 class="dashboard-title">Admin Dashboard - Manage Agents</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Approval Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>
                            <span class="status {{ $agent->is_approved ? 'approved' : 'not-approved' }}">
                                {{ $agent->is_approved ? 'Approved' : 'Not Approved' }}
                            </span>
                        </td>
                        <td>
                            @if(!$agent->is_approved)
                                <form action="{{ route('admin.agents.approve', $agent->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            @else
                                <form action="{{ route('admin.agents.disapprove', $agent->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Disapprove</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
    }

    .container {
        margin-top: 40px;
    }

    .dashboard-title {
        text-align: center;
        font-size: 2rem;
        color: #333;
        margin-bottom: 40px;
    }

    .table {
        width: 100%;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table thead th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table tbody tr {
        transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .status {
        padding: 8px 12px;
        border-radius: 4px;
        font-weight: bold;
    }

    .approved {
        background-color: #28a745;
        color: white;
    }

    .not-approved {
        background-color: #dc3545;
        color: white;
    }

    .alert {
        font-size: 14px;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

</style>
