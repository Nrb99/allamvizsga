<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="container-fluid">
        <ul>
            <li><img src="" alt=""></li>
            <li><a href="/" class="contrast">ReserveIT</a></li>
        </ul>
        <ul class="contrast">
            <li><a href="/">Home</a></li>

        </ul>

    </nav>
    <main>
    <div class="container">
        <article>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            @endif
            <hgroup>
                <h1>Create your salon</h1>
                <p>Fill the form fields to create a salon</p>
            </hgroup>
            <form action="/create" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name">
                <label for="description">Description</label>
                <textarea name="description"></textarea>
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number" placeholder="0720000000">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="example@example.com">
                <label for="picture">Picture</label>
                <input type="file" name="logo" placeholder="logo">
                <button>Send</button>

            </form>
        </article>
    </div>
</main>
<footer class="container-fluid">

    <h1>ReserveIT</h1>
    <p>Kiraly Norbert</p>

</footer>
</body>

</html>
