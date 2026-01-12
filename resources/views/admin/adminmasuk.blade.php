<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login admin</title>
</head>

<body>
    <h1>Login Admin</h1>
    <form action={{ route('admin.post') }} method="POST">
        @csrf
        <input type="email" placeholder="Email" name="email">
           @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        <input type="password" placeholder="Password" name="password">
           @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        <button type="submit ">Masuk</button>
    </form>
</body>

</html>
