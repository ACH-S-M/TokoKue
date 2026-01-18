<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preload" as="image" href="/img/svg/dashboard.svg">
    <link rel="preload" as="image" href="/img/svg/cake.svg">
    <link rel="preload" as="image" href="/img/svg/pesanan.svg">
    <link rel="preload" as="image" href="/img/svg/laporan.svg">
    <link rel="preload" as="image" href="/img/svg/pelanggan.svg">
    <link rel="preload" as="image" href="/img/svg/setting.svg">
    <link rel="preload" as="image" href="/img/svg/logout.svg">

</head>

<body>
    <div class="flex min-h-screen gap-4">
        @yield('sidebar')
        <main class="p-8 w-screen">
            @yield('content')
        </main>
    </div>
</body>
@stack('scripts')

</html>
