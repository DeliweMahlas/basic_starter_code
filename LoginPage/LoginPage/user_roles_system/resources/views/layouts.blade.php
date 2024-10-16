<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Profile Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
  
    </header>

    <main>
        @yield('content')
    </main>

   
</body>

</html>
<style>
    footer {
        font-size: 14px;
        color: #6c757d;
    }

</style>
