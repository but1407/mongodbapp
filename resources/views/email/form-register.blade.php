<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <!-- Đưa vào thư viện jQuery -->

    <form action="{{ route('register') }}" method="post">
        @csrf
        first-name: <input type="text" name="first_name">
        last-name: <input type="text" name="last_name">
        birth: <input type="date" name="birth">
        gender: <input type="text" name="gender">
        email: <input type="email" name="email">
        password: <input type="password" name="password">
        <input type="submit" value="okla">
    </form>

</body>

</html>
