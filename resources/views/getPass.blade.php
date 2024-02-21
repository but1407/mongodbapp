<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @include('admin.head') --}}
</head>

<body>
    <div id="app">
        <form action="{{ route('') }}" method="post" role="form">
            @csrf
            <h2>dat lai mat khau</h2>
            <div class="">
                PASSWORD: <input type="password" name="password" placeholder="your-password">
            </div>
            <div class="">
                confirm password: <input type="password" name="confirm_password">
                @error('confirm_password')
                    <small> {!! $message !!}</small>
                @enderror
            </div>
            <button type="submit">dat lai mat khau</button>
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
