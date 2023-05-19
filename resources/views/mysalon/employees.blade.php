<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">

    <title>My Employees</title>
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><img src="" alt=""></li>
            <li><a href="/" class="contrast">ReserveIT</a></li>
        </ul>

        <ul>
            <li><a href="myemployees">Employees</a> </li>
            <li><a href="myservices">Services</a></li>
            <li><a href="myreservations">Reservations</a></li>
        </ul>

    </nav>

    <header class="container-fluid"style="text-align:center">
        <thead>
            <h1>Your employees list</h1>
            <p>In this table you can manage your employees</p>
        </thead>
    </header>

    @if (Session::has('message'))
    <p>{{ Session::get('message')}}</p>
    @endif
    <article>
    <main class="container-fluid">
        <a href="/addemployee" role="button" style="background: green">Add new employee</a>
        <figure>

        <table role="grid">
            <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>starts_at</th>
            <th>ends_at</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Reservations</th>
            <th>Services</th>
        </tr>
        @foreach ($employees as $employee )
        <form action="deleteemployee/{{ $employee->id }}" method="POST">
            @csrf
            @method('DELETE')
        <tr>
            <td><img style="max-width:50px" src="/storage/{{ $employee->picture }}" alt=""></td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->starts_at }}</td>
            <td>{{ $employee->ends_at }}</td>
            <td><a href="editemployee/{{ $employee->id }}" role="button">Edit</a></td>

            <td>
                <button style="background: red;display:block">Delete</button>
            </td>
            <td><a href="employeereservations/{{ $employee->id }}" role="button" class="contrast">Reservations</a></td>
            <td><a role="button" href="employeeservices/{{ $employee->id }}">Services</a></td>
        </tr>
        </form>
        @endforeach
        </table>

    </figure>
    </main>
</article>

    <footer>

            <h1>ReserveIT</h1>
            <p>Kiraly Norbert</p>

    </footer>


</body>

</html>
