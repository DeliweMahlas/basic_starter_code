@extends('layouts')
@section('title','Registration')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<div class="container mt-5">
    <div class="alerts">
        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>

    <div class="form-container">
        <form action="{{route('register.post')}}" method="post" class="form">
            @csrf
            <h1 class="text-center">Registration Form</h1>

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="surname" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Physical Address</label>
                <input type="text" class="form-control" name="address">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="agent">Agent</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

@endsection

<style>
    body {
        font-family: 'Helvetica Neue', Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 800px;
        padding: 20px;
        margin: 0 auto;
    }

    .alerts {
        margin-bottom: 20px;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-container:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    .form-control, .form-select {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
        width: 100%;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 12px;
        font-size: 16px;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .text-center {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
    }
</style>
