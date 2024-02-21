<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="">
        <div id="laravelDataContainer">{{ $user }}</div>

        <form action="{{ route('verification.verify_OTP') }}" method="post">
            {{-- email: {{ $email }} --}}
            <input type="text" hidden name="user_id" value="{{ $id }}">
            Otp: <input type="text" placeholder=" nhap otp" name="OTP_token">
            <button>submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        fetch('/fetch-data')
            .then(response => response.json())
            .then(data => {

                displayData(data);
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>

</html>
