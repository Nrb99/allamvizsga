<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Document</title>
</head>
<body class="container-fluid">
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
    <main>
        <div class="container">
            <form action="/deletepics" method="POST">
                @csrf
                @method('DELETE')
        <table>
            <tr>
                <th>Select</th>
                <th>Picture</th>

            </tr>
            @foreach ($pictures as $picture )
            <tr>
                <td>
                    <input type="checkbox" name="selectedPictures[]" value="{{ $picture->id }}">
                </td>
                <td><img style="max-width:32px" src="/storage/{{ $picture->name }}" alt=""></td>

            </tr>

            @endforeach


        </table>
        <button>Delete selected</button>
            </form>
    </nav>
    </div>
    </main>
</body>
<footer>

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>
</html>
