<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">

    <title>Edit logo</title>
</head>
<body>
    <article class="container">
    <form action="/editlogo" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="picture">
        <button>Change</button>
    </form>
</article>
<footer>

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>
</body>
</html>
