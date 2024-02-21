<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>
    <div id="app">
        <form action="" method="post">
            @csrf
            <legend>Lay lai mat khau</legend>
            <div class="">

                EMAIl: <input type="email" name="email" placeholder="your-emails">

            </div>
            <button type="submit">send mail</button>
        </form>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach
    @endif
    {{-- footer --}}
</body>

</html>
