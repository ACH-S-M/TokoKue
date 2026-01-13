<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 font-[Figtree]">

    <main class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800">
            Daftar Disini
        </h1>
        <form class="mt-6 space-y-4" action="{{ route('daftar.post') }}" method="post">
            @csrf
            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

            <input type="email" name="email_pelanggan" placeholder="Email Pelanggan"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

            <input type="tel" name="telepon_pelanggan" placeholder="No Telepon"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('telepon_pelanggan')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror

            <input type="text" name="alamat_pelanggan" placeholder="Alamat"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('Alamat_pelanggan')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
             @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message  }} Gunakan Huruf besar, kecil dan juga angka </p>
            @enderror
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition">
                Kirim
            </button>
        </form>
        <h1 class="text-center">Sudah Punya akun ?<a href={{ route('login') }} class="font-bold text-emerald-400">Daftar disini</a> </h1>
    </main>

</body>

</html>
