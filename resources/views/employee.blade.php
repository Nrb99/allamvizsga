<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $employee->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><img src="" alt=""></li>
            <li><a href="/" class="contrast">ReserveIT</a></li>
        </ul>
        @auth
            <ul>
                @if (empty(auth()->user()->salon))
                    <li> <a href="/create">New Salon</a></li>
                @else
                    <li><a href="/mysalon">My Salon</a></li>
                @endif
                <li><a href="/logout">Log out</a></li>
            </ul>
        @else
            <ul class="contrast">
                <li><a href="/registration">Create user</a></li>
                <li><a href='/login'>Login</a></li>
            </ul>
        @endauth

    </nav>
    <main class="container">
        @if (Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <article>
            @if ($employee->picture != null)
                <img style='max-width:33%'src="/storage/{{ $employee->picture }}" alt="">
            @endif

            <h1>{{ $employee->name }}</h1>
            <p>{{ $employee->description }}</p>
            <ul>
                <h3>Services</h3>
                @foreach ($employee->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
            <p>{{ $employee->starts_at }}-{{ $employee->ends_at }}</p>
        </article>
        <article>



            <div class="grid">
                @foreach ($employee->photos as $photo)
                    <img src="/storage/employeeportfolio/{{ $photo->picture }}" alt="">
                @endforeach
            </div>


            <form method="GET" action="/reserve/{{ $employee->id }}">
                @csrf
                <label for="date">Select the date when you want a reservation</label>
                <input type="date" name="date" min="{{ date('Y-m-d') }}">

                <button style="width: 25% ">Send</button>
            </form>
        </article>

    </main>
    <footer class="container-fluid">

        <h1>ReserveIT</h1>
        <p>Kiraly Norbert</p>

    </footer>


</body>

</html>
