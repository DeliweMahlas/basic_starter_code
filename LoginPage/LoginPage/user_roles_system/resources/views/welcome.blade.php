<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
        }

        /* Full-page background */
        .welcome-section {
            background: url('https://example.com/background-image.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: white;
        }

        /* Overlay for darker effect */
        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin: 0 15px;
            text-decoration: none;
            color: white;
        }

        .btn-login {
            background-color: #3498db;
        }

        .btn-register {
            background-color: #2ecc71;
        }

        /* Hover effect */
        .btn-login:hover {
            background-color: #2980b9;
        }

        .btn-register:hover {
            background-color: #27ae60;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 3rem;
            }
            p {
                font-size: 1.2rem;
            }
            .btn {
                padding: 12px 25px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="welcome-section">
        <h1>Welcome to Our Platform</h1>
        <p>Your one-stop destination for all services</p>

        <!-- Buttons for Login and Register -->
        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn btn-register">Register</a>
        </div>
    </div>

</body>
</html>
