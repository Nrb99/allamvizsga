<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>{{ $salon->name }}</title>
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
    <main class="container-fluid">

        <div class="container">
            <article class="grid">

                <div>
                    <div>
                        <img style="max-width: 300px" src="/storage/{{ $salon->logo }}" alt="">

                    </div>
                    <h1>{{ $salon->name }}</h1>
                    <p>{{ $salon->description }}</p>


                    <h3>Contacts</h3>
                    <p>Pnone number: {{ $salon->phone_number }}</p>
                    <p>Email: {{ $salon->email }}</p>
                    <a role="button" href="/edit">Edit</a>
                    <a role="button" href="/editpfp">Change Logo</a>

                </div>

            </article>
            <article>
                <h1>Photos</h1>
                <div class="grid">
                    @foreach ($salon->pictures as $picture )

                        <img  src="/storage/{{ $picture->name }}" alt="">
                    @endforeach

                </div>
                <a href="/addpic" role="button">Add more pictures</a>
                <a href="/mypictures" role="button">Manage pictures</a>
            </article>
        </div>
    </main>
    <footer>

        <h1>ReserveIT</h1>
        <p>Kiraly Norbert</p>

</footer>

</body>

</html>
