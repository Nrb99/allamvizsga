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
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="/updateemployee" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='id' value="{{ $employee->id }}">
    <label for="name">Enter employee name</label>
    <input type="text" name='name' value="{{ $employee->name }}">
        <label for="description">Description</label>
    <input type="text" name='description' value="{{ $employee->description }}">
    <label for="starts_at">Starting hour</label>
    <input type="time" name="starts_at" value="{{ $employee->starts_at }}">
    <label for="ends_at">Ending hour</label>
    <input type="time" name="ends_at" value="{{ $employee->ends_at }}">
    <label for="picture">Picture</label>
    <input type="file" name="picture">

    <button>Send</button>
    </form>
</article>
</main>

<footer>

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>

</body>
</html>
