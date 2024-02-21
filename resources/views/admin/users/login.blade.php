<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>
    <div id="app">
        <form action="{{ route('users.store') }}" method="post">
            @csrf

            EMAIL: <input type="email" name="email" placeholder="{{ $inputName }}">


            PASSWORD: <input type="password" name="password" placeholder="{{ $inputPass }}">

            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
            <div class="forgotPass">
                <a href="{{ route('users.forgetPass') }}">forgot Password</a>
                <a href="{{ route('users.index') }}">register</a>

            </div>
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
