<aside class="fixed inset-y-0 left-0 w-64 bg-blue-900 text-slate-200 flex flex-col z-20">

    <!-- Brand -->
    <div class="px-6 py-5 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <div class="bg-primary/20 text-primary p-2 rounded-xl">
                <span class="material-symbols-outlined text-xl">bakery_dining</span>
            </div>
            <div>
                <h1 class="text-white font-bold leading-tight">Lumière</h1>
                <p class="text-xs text-slate-400">Admin Panel</p>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-1">
        <!-- Active -->
        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-primary text-white font-semibold shadow-sm">
            <img class="w-[25px]  " src="/img/svg/dashboard.svg">
            <span class="text-sm">Dashboard</span>
        </a>

        <!-- Item -->
        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <span class="material-symbols-outlined text-lg">inventory_2</span>
            <span class="text-sm">Products</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <span class="material-symbols-outlined text-lg">shopping_cart</span>
            <span class="text-sm">Orders</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <span class="material-symbols-outlined text-lg">bar_chart</span>
            <span class="text-sm">Reports</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <span class="material-symbols-outlined text-lg">group</span>
            <span class="text-sm">Customers</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="px-4 py-5 border-t border-slate-800 space-y-2">
        <a href="#"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <span class="material-symbols-outlined text-lg">settings</span>
            <span class="text-sm">Settings</span>
        </a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button
                class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition font-semibold">
                <span class="material-symbols-outlined text-lg">logout</span>
                <span class="text-sm">Logout</span>
            </button>
        </form>
    </div>
</aside>
