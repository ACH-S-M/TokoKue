<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen font-[Figtree] bg-black">

<div class="grid lg:grid-cols-2 min-h-screen">

    {{-- ================= LEFT IMAGE ================= --}}
    <div class="hidden lg:block relative">
         <div class="absolute inset-0 bg-cover bg-center"
                data-alt="Minimalist top view of cold brew coffee and croissant"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDCTglNvaFcgiRXTWWye-LHpFKEVoZusMWZJjfx06W6A7R8CLobQCoj6swgjQgGG4K6Y1VV9iUHsS1E-OoCwtxeOXJ5E1bYf4tNkC6LvC3dt7Qr3Ya3CnIYUCDVAZpa_2IJs-Wm3H7-Z-IpRKP8qgeLl31xG8OXT5AR9O5RolXsgXXq66MyNlhfpT-DXqBq-yhlM_ftNZ44nhJEK2uNNqZBZhFnyu6vAqEPlyQE6BLg3AysCmG7SkMDsks2NQpPZyAm3ZbEauIxyE8");'>
                <div class="absolute inset-0 bg-primary/10 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-background-dark/60 via-transparent to-transparent">
                </div>
            </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/10"></div>
    </div>

    {{-- ================= RIGHT FORM ================= --}}
    <div class="flex items-center justify-center bg-[#0f172a] px-6 py-12">

        <div class="w-full max-w-md text-white">

            <div class="mb-10">
                <h1 class="text-4xl font-bold mb-3">
                    Welcome
                </h1>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Buat akun untuk mulai memesan kue favoritmu.
                    Fresh baked. Fresh start.
                </p>
            </div>

            <form class="space-y-6" action="{{ route('daftar.post') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">Nama Lengkap</label>
                    <input type="text"
                           name="nama_pelanggan"
                           value="{{ old('nama_pelanggan') }}"
                           class="w-full bg-transparent border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-500 transition"
                           placeholder="Nama lengkap">
                    @error('nama_pelanggan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">Email Address</label>
                    <input type="email"
                           name="email_pelanggan"
                           value="{{ old('email_pelanggan') }}"
                           class="w-full bg-transparent border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-500 transition"
                           placeholder="Email">
                    @error('email_pelanggan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Telepon --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">Nomor Telepon</label>
                    <input type="tel"
                           name="telepon_pelanggan"
                           value="{{ old('telepon_pelanggan') }}"
                           class="w-full bg-transparent border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-500 transition"
                           placeholder="08xxxxxxxxxx">
                    @error('telepon_pelanggan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">Alamat</label>
                    <textarea name="alamat_pelanggan"
                              rows="2"
                              class="w-full bg-transparent border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-500 transition"
                              placeholder="Alamat lengkap">{{ old('alamat_pelanggan') }}</textarea>
                    @error('alamat_pelanggan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">Password</label>
                    <input type="password"
                           name="password"
                           class="w-full bg-transparent border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-500 transition"
                           placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Button --}}
                <button type="submit"
                        class="w-full bg-emerald-600 hover:bg-emerald-700 transition py-3 rounded-lg font-semibold shadow-lg">
                    Daftar
                </button>

            </form>

            {{-- Footer --}}
            <div class="mt-8 text-center text-gray-400 text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="text-emerald-400 hover:underline font-medium">
                    Masuk di sini
                </a>
            </div>

            <div class="mt-10 flex justify-center gap-6 text-xs text-gray-500">
                <a href="#">Help Center</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
