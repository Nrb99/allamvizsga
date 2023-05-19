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
    <main class="container">
    <article>
    @if (Session::has('message'))
        <p>{{ Session::get('message')}}</p>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach

    @endif
    <form action="/newemployee" method="POST", enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input type="text" name='name' placeholder="Name">
    <label for="description">Description</label>
    <input type="textarea" name='description'  placeholder="Description">
    <label for="starts_at">Starting hour</label>
    <input type="time" name="starts_at">
    <label for="ends_at">Ending hour</label>
    <input type="time" name="ends_at">
    <label for="picture">Picture</label>
    <input type="file" name="picture">


    <button>Send</button>
    </form>

</article>
</main>
</body>
</html>
