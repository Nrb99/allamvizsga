<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Reservations</title>
</head>
<body class="container-fluid">

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

    <header style="text-align: center">
        <thead style="text-align: center">
            <h1>Your reservation list</h1>
            <p>In this table you can manage your reservations</p>
        </thead>
    </header>
    <main class="container-fluid">
        <figure>
        <table>
            <tr>
                <th>Client name</th>
                <th>Employee</th>
                <th>email</th>
                <th>Phone number</th>
                <th>starts_at</th>
                <th>ends_at</th>
            </tr>
            @foreach ($reservations as $reservation )
            <tr>
                <td>{{ $reservation->client_name }}</td>
                <td><a href="/employeereservations/{{ $reservation->employee_id }}">{{ $reservation->employee->name }}</a></td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->phone_number }}</td>
                <td>{{ $reservation->reservation_time }}</td>
                <td>{{ $reservation->estimated_end }}</td>
            </tr>
            @endforeach

        </table>
    </figure>
    </main>
    <footer>

        <h1>ReserveIT</h1>
        <p>Kiraly Norbert</p>

    </footer>
</body>

</html>
