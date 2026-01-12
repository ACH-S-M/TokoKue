<nav class="w-full bg-blue-950 shadow-sm border-b px-6 py-4">
    <div class="max-w-8xl flex justify-between gap-4 items-center">
        <div class="flex nav-link gap-4">
            <h1>Produk Terpopuler </h1>
            <h1>Diskon Harian </h1>
            <h1>Barang Baru</h1>
            <h1>Keranjang</h1>
        </div>

        {{-- Guest --}}
        @guest('pelanggan')
            <div class="flex items-center gap-3">
                <a href="{{ route('daftar') }}"
                    class="px-4 py-2 rounded-lg border border-blue-600 text-blue-600
                          hover:bg-blue-600 hover:text-white transition">
                    Daftar
                </a>

                <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-lg bg-green-600 text-white
                          hover:bg-green-700 transition">
                    Login
                </a>
            </div>
        @endguest

        {{-- Auth --}}
        @auth('pelanggan')
            <div class="flex items-center justify-end gap-4 ">
                <span class="text-gray-700">
                    Halo, <span class="font-semibold">{{ auth('pelanggan')->user()->nama_pelanggan }}</span>
                </span>
                <form action="{{ route('pelanggan.logout') }}" method="post">
                 @csrf 
                <button
                    class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                    Logout
                </button>
                </form>
            </div>
        @endauth

    </div>
</nav>
