<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><img src="" alt=""></li>
            <li><a href="/">ReserveIT</a></li>
        </ul>
    @auth
    <ul>
        <li><a href="/logout">Log out</a></li>
    </ul>
    @else
        <ul class="contrast">
            <li><a href="/registration">Create user</a></li>

        </ul>
    @endauth
</nav>

    <main>
        @if (Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <div class="container">
            <article>
                <hgroup>
                    <h1>Login</h1>
                    <p>Log in to your account</p>
                </hgroup>
                <form action="users/authenticate" method="POST">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif
                    <input type="email" name="email" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button>Login</button>

                    <p>Don't have an account? </p>
                    <a role="button" class="contrast" href="/registration">Register</a>



                </form>
            </article>
        </div>


    </main>
    <footer>
        <p>szia</p>
    </footer>

</body>

</html>
