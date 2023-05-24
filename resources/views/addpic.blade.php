<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Photo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">

</head>
<body>
    <main class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <p>{{ $error }}</p>
        @endforeach

    @endif

    <article>
    <form action="/addphoto" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name='picture[]' multiple>
    <button>Send</button>
    </form>
</article>
</main>
<footer class="container-fluid">

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>

</body>
</html>
