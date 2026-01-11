<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="antialiased">

    {{-- Gunakan ini kalo misalkan ga ada authentikasi  --}}
   @guest('pelanggan')
        <div class="flex w-full bg-red-600 p-5 gap-4 ">
        <a href={{ route(name: 'login') }} class="bg-green-400 p-2 rounded-md "> Masuk </a>
        <a href={{ route('daftar') }} class="bg-blue-400 p-2 rounded-md "> Daftar </a>
    </div>
   @endguest

    @auth('pelanggan')
      <h1 class="Text-3xl ">Selamat datang user </h1>

    @endauth
</body>

</html>
