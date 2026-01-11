<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 font-[Figtree]">

    <main class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800">
            Login
        </h1>
        <form class="mt-6 space-y-4" action="{{ route('login.post') }}" method="post">
            @csrf

            <input
                type="email"
                name="email_pelanggan"
                value="{{ old('email_pelanggan') }}"
                placeholder="Email"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            >

            <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition"
            >
                Masuk
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Belum punya akun?
            <a href="{{ route('daftar') }}" class="text-green-600 hover:underline font-semibold">
                Daftar
            </a>
        </p>
        
        @if ($errors->any())
            <div class="mt-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif
    </main>

</body>
</html>
