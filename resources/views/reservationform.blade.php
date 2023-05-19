<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">

    <title>Document</title>

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

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    @endif
    <div class="container">

        <article>
            <hgroup>
                <h1>Reservation to {{ $employee->name }}</h1>
                <p>Please fill the form to register your reservation</p>
            </hgroup>
            <form action="/reserve" method="POST">
                @csrf
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                <input type="text" name="name" placeholder="Enter full name here">
                <input type="text" name="email" id="" placeholder="example@example.com">
                <input type="text" name="phoneNumber" id="Phone number">
                <div style="display: none">
                    <input type="date" name="date" value={{ $date }} min="{{ date('Y-m-d') }}">
                </div>
                <select name="time" id="">
                    @foreach ($availabletimes as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach
                </select>
                {{-- <input type="time" name="time"> --}}
                <select name="service" id="">
                    @foreach ($employee->services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                <button>Send</button>
            </form>
        </article>
    </div>
    <footer>
        <p>Sziamiau</p>
    </footer>

</body>

</html>
