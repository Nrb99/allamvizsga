<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReserveIT</title>
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
    <header>
        <div class="container">

            <h1 style="text-align:center">Welcome to the ReserveIT site</h1>
            <p style="text-align:center">Find your favourite salon here.We offer here a large scale of salons whom offer
                a large scale of services. Make your reservation here.It is simple and fast method of reservartion.You can find the salons below.
            </p>

        </div>
    </header>

    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif

    <div class="container">

        @foreach ($salons as $salon)



            <article>
                <div class="grid">
                    <div>
                        <img src="storage/{{ $salon->logo }}" alt="">

                    </div>
                    <div>
                        <h3><a href="/salons/{{ $salon->id }}">{{ $salon->name }}</a> </h3>
                        <p>{{ $salon->description }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
                            repudiandae laudantium molestiae enim rem dignissimos, eveniet aut consequatur? Dolores
                            consequatur blanditiis illo ab. Omnis totam dicta eaque alias commodi ratione!</p>

                        @foreach ($salon->services as $service)
                            <p>{{ $service->name }}</p>
                        @endforeach

                    </div>
                </div>

            </article>



        @endforeach
    </div>
    <footer>

        <h1>ReserveIT</h1>
        <p>Kiraly Norbert</p>

    </footer>





</body>

</html>
