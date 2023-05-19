<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
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
        <article>
            <img style="max-width:300px" src="/storage/{{ $salon->logo }}" alt="">
            <h1> {{ $salon->name }} </h1>
            <p> {{ $salon->description }} </p>
            <div>
                <h3>Contacts</h3>
                <p>email: {{ $salon->email }}</p>
                <p>phone number: {{ $salon->phone_number }}</p>
            </div>
            <h3>Employees</h3>
            <div class="grid">

                @foreach ($salon->employees as $employee)
                <div>
                    <a href="/employee/{{ $employee->id }}">{{ $employee->name }}</a>
                    <img src="/storage/{{ $employee->picture }}" alt="">

                </div>
                @endforeach



            </div>
            <h3> Pictures</h3>
            <div class="grid">

                @foreach ($salon->pictures as $picture)
                    <a href="/storage/{{ $picture->name }}"><img src="/storage/{{ $picture->name }}"
                            alt=""></a>
                @endforeach

            </div>
        </article>


    </main>

    {{-- <a href="/reservation/{{ $salon->id }}">Foglalas</a> --}}

</body>

</html>
