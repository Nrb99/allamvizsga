<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
    <main class="container">


    <article class="grid">
    @if (Session::has('message'))
        <p>{{ Session::get('message')}}</p>
    @endif
    <div>
    @if ($errors->any())
    @foreach ($errors->all() as $error )
        <p style="color:red">{{ $error }}</p>
    @endforeach
    @endif
    <form action="/registration" method="POST">
    @csrf
    <label for="name">Username</label>
    <input type="text" name="name" placeholder="Username">
    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="E-mail">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password">
    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation" placeholder="Confirm password">
    <button>Register</button>
    </form>
</div>


    </article>
</main>
</body>
</html>
