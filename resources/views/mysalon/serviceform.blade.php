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
        <ul>
            <li><a href="/myemployees">Employees</a> </li>
            <li><a href="/myservices">Services</a> </li>
            <li><a href="/myreservations">Reservations</a></li>
        </ul>
    </nav>
    <main class="container">
        <article>
            @if (Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        @endif
    <form action="/addservice" method="POST">
        @csrf
        <select name="id" id="">
            @foreach ($services as $service )
                <option  value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach

        </select>
        <button>Add Service</button>
    </form>
</article>
</main>
</body>
<footer>

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>
</html>
