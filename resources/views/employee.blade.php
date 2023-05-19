<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $employee->name }}</title>
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
        @if (Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <article>
            @if ($employee->picture != null)
                <img src="/storage/{{ $employee->picture }}" alt="">
            @endif

            <h1>{{ $employee->name }}</h1>
            <p>{{ $employee->description }}</p>
            <ul>Szolgaltatasok:
                @foreach ($employee->services as $service)
                    <li>{{ $service->name }}</li>
                    <li>{{ $service->pivot->duration }}</li>
                @endforeach
            </ul>
            <p>{{ $employee->starts_at }}-{{ $employee->ends_at }}</p>
            <article>
                @auth
                    @if ($employee->salon->user_id == auth()->user()->id)
                        <a role="button" href="/editemployee/{{ $employee->id }}">Edit employee</a>
                        <form action="/deleteemployee/{{ $employee->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $employee }}">
                            <button>Delete</button>
                        </form>
                        <form action="/addphoto/{{ $employee->id }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="pictures[]">Add photos of your employees work</label>
                            <input type="file" name="pictures[]" multiple>
                            <button>Upload images</button>
                        </form>
                    @endif
                @endauth


                <div class="grid">
                    @foreach ($employee->photos as $photo)
                        <img src="/storage/employeeportfolio/{{ $photo->picture }}" alt="">
                    @endforeach
                </div>


                <form method="GET" action="/reserve/{{ $employee->id }}">
                    @csrf
                    <label for="date">Select the date when you want a reservation</label>
                    <input type="date" name="date" min="{{ date('Y-m-d') }}">

                    <button style="width: 25% ">Send</button>
                </form>

    </main>


</body>

</html>
