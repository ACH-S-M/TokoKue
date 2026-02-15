<aside class=" inset-y-0 max-h-screen sticky left-0 w-64 bg-blue-900 text-slate-200 flex flex-col z-20">

    <!-- Brand -->
    <div class="px-6 py-5 border-b border-slate-800">
        <div class="flex flex-col gap-3">
            <div>
                <h1 class="text-white font-bold leading-tight">Halo {{ auth()->guard('admin')->user()->nama_admin }}</h1>
                <p class="text-xs text-slate-400">Admin Panel</p>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-1">
        <a href={{route('admin.home')}}
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.home') ? 'bg-primary text-yellow-600 font-semibold shadow-sm' : 'font-normal '}}">
            <img class="w-[25px]" src="/img/svg/dashboard.svg">
            <span class="text-sm">Dashboard</span>
        </a>
        <a href="{{ route('admin.produk') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.produk') ? 'bg-primary text-yellow-600 font-semibold shadow-sm' : 'font-normal '}}">
            <img class="w-[25px]  " src="/img/svg/produk.svg">
            <span class="text-sm">Kelola Produk</span>
        </a>

        <a href="{{ route('admin.pesanan') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <img class="w-[25px]  " src="/img/svg/pesanan.svg">
            <span class="text-sm">Pesanan</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <img class="w-[25px]  " src="/img/svg/laporan.svg">
            <span class="text-sm">Laporan keuangan</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <img class="w-[25px]  " src="/img/svg/pelanggan.svg">
            <span class="text-sm">pelanggan</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="px-4 py-5 border-t border-slate-800 space-y-2">
        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <img class="w-[25px]  " src="/img/svg/setting.svg">
            <span class="text-sm">Settings</span>
        </a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button
                class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition font-semibold">
                <img class="w-[25px]  " src="/img/svg/logout.svg">
                <span class="text-sm">Logout</span>
            </button>
        </form>
    </div>
</aside>
