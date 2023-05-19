<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Update</title>
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><img src="" alt=""></li>
            <li><a href="/" class="contrast">ReserveIT</a></li>
        </ul>

        <ul>
            <li><a href="/myemployees">Employees</a> </li>
            <li><a href="/myservices">Services</a></li>
            <li><a href="/myreservations">Reservations</a></li>
        </ul>

    </nav>
    <div class="container">
        <article>
            <form action="/update" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $salon->id }}">
                <input type="text" name="name" value="{{ $salon->name }}">
                <input type="text" name="description" value="{{ $salon->description }}">
                <input type="text" name="phone_number" value="{{ $salon->phone_number }}">
                <input type="email" name="email" value="{{ $salon->email }}">
                <button>Change</button>
            </form>
        </article>
    </div>
</body>

</html>
