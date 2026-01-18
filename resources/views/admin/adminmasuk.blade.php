<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body
    class="min-h-screen font-[Figtree] bg-[linear-gradient(rgba(2,6,23,0.88),rgba(2,6,23,0.95)),url('/img/bakery-bg.jpg')] bg-cover bg-center flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Admin Control Panel
            </h1>
            <p class="text-slate-400 text-sm mt-2">
                Authorized personnel only
            </p>
        </div>

        <!-- Card -->
        <form
            class="relative rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl
                   shadow-[0_25px_60px_rgba(0,0,0,0.8)]
                   p-8 flex flex-col gap-6"
            action="{{ route('admin.post') }}"
            method="POST">
            @csrf

            <!-- Email -->
            <div class="flex flex-col gap-1">
                <label class="text-slate-300 text-sm font-medium">
                    Administrator Email
                </label>
                <div class="relative">
                    <span
                        class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 w-[18px]">
                        <img src="/img/svg/profile.svg">
                    </span>
                    <input
                        type="email"
                        name="email"
                        autocomplete="username"
                        placeholder="admin@company.com"
                        class="w-full h-14 rounded-xl bg-slate-900/60 border border-slate-700
                               text-white placeholder:text-slate-500
                               focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500
                               pl-10 pr-4 transition-all">
                </div>
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="flex flex-col gap-1">
                <label class="text-slate-300 text-sm font-medium">
                    Password
                </label>
                <div class="relative">
                    <span
                        class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 w-[18px]">
                        <img src="/img/svg/password.svg">
                    </span>
                    <input
                        type="password"
                        name="password"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full h-14 rounded-xl bg-slate-900/60 border border-slate-700
                               text-white placeholder:text-slate-500
                               focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500
                               pl-10 pr-4 transition-all">
                </div>
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button
                class="mt-4 w-full h-14 rounded-xl
                       bg-gradient-to-r from-blue-500 to-cyan-500
                       text-white font-bold tracking-wide
                       hover:brightness-110 hover:shadow-[0_0_25px_rgba(56,189,248,0.4)]
                       active:scale-[0.97] transition-all">
                Login Administrator
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-slate-500 text-[10px] tracking-widest uppercase">
                © 2024 Lumière Pâtisserie — Internal System
            </p>
        </div>
    </div>

</body>
</html>
