<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session('success'))
        {{ session('success') }}
        </br>
        
    @endif

    @if (Auth::user())
        <p>Welcome {{ Auth::user()->name }}</p>
        <img style="border-radius: 50%" src="{{ Auth::user()->google_avatar }}" alt="avatar">
    @endif
    <a href="/auth/google/redirect">Login</a>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Log out</button>
    </form>
</body>
</html>