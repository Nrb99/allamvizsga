<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">

    <title>Services</title>
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
    <a role="button" href="/addemployeeservice/{{ $employee->id }}">Add service</a>
    <form action="/deleteemployeeservice" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $employee->id }}">
    <figure>


        <table>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Duration</th>
            </tr>
            @foreach ($services as $service )
            <tr>
                <td><input type="checkbox" name='services[]' value="{{ $service->id }}"></td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->pivot->duration }}</td>

            </tr>
            @endforeach

        </table>


    </figure>
    <button style="background:red;">Delete</button>
</form>
</article>
</main>
<footer class="container-fluid">

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>
</body>
</html>
