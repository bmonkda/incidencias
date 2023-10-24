<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        
        <label for="uid">Usuario
            <input type="text" name="uid" id="uid" placeholder="Usuario..." value="{{ old('uid') }}">
            @error('uid') <div>{{ $message }}</div> @enderror
        </label>

        <label for="">Password
            <input type="password" name="password" id="password" placeholder="Password...">
            @error('password') <div>{{ $message }}</div> @enderror
        </label>

        <input type="submit" value="Login">

    </form>
</body>
</html>