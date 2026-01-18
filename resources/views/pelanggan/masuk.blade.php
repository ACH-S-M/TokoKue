<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login </title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2badee",
                        "secondary-dark": "#0d171b",
                        "slate-accent": "#4c809a",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101c22",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-secondary-dark dark:text-white antialiased">
    <div class="flex min-h-screen flex-col lg:flex-row">


        <div class="relative hidden lg:flex lg:w-1/2 items-center justify-center bg-slate-200">
            <div class="absolute inset-0 bg-cover bg-center"
                data-alt="Minimalist top view of cold brew coffee and croissant"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDCTglNvaFcgiRXTWWye-LHpFKEVoZusMWZJjfx06W6A7R8CLobQCoj6swgjQgGG4K6Y1VV9iUHsS1E-OoCwtxeOXJ5E1bYf4tNkC6LvC3dt7Qr3Ya3CnIYUCDVAZpa_2IJs-Wm3H7-Z-IpRKP8qgeLl31xG8OXT5AR9O5RolXsgXXq66MyNlhfpT-DXqBq-yhlM_ftNZ44nhJEK2uNNqZBZhFnyu6vAqEPlyQE6BLg3AysCmG7SkMDsks2NQpPZyAm3ZbEauIxyE8");'>


                <div class="absolute inset-0 bg-primary/10 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-background-dark/60 via-transparent to-transparent">
                </div>
            </div>
            <div class="relative z-10 px-20 text-white">
                <div class="mb-6 flex items-center gap-3">
                    <div class="size-10 text-primary">
                        <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">Artisan Crust</span>
                </div>
                <h1 class="text-5xl font-black leading-tight mb-4">The perfect brew, <br />every morning.</h1>
                <p class="text-lg opacity-90 max-w-md">Experience the craft of small-batch baking and single-origin
                    coffee right in the heart of the city.</p>
            </div>
        </div>

        <div
            class="flex flex-1 flex-col justify-center px-6 py-12 sm:px-12 lg:flex-none lg:w-1/2 lg:px-24 bg-background-light dark:bg-background-dark">
            <!-- Mobile Logo -->
            <div class="lg:hidden mb-8 flex items-center gap-2">
                <div class="size-8 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold">Artisan Crust</h2>
            </div>
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <h2 class="text-3xl font-black leading-9 tracking-tight text-secondary-dark dark:text-white">Welcome
                        Back</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-accent dark:text-slate-400">
                        Log in to manage your orders and rewards. Freshly baked treats and cold-brewed coffee are just a
                        click away.
                    </p>
                </div>
                </form>
                <div class="mt-10">
                    <form action="#" class="space-y-6" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <!-- Email Field -->
                        <div>
                            <label class="block text-sm font-medium leading-6 text-secondary-dark dark:text-slate-200"
                                for="email">Email Address</label>
                            <div class="mt-2">
                                <input autocomplete="email"
                                    class="block w-full rounded-lg border-0 py-3.5 px-4 text-secondary-dark shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:bg-slate-800 dark:text-white dark:ring-slate-700 sm:text-sm sm:leading-6"
                                    type="email" name="email_pelanggan" value="{{ old('email_pelanggan') }}"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div>
                            <div class="flex items-center justify-between">
                                <label
                                    class="block text-sm font-medium leading-6 text-secondary-dark dark:text-slate-200"
                                    for="password">Password</label>
                                <div class="text-sm">
                                    <a class="font-medium text-primary hover:text-primary/80 underline underline-offset-4"
                                        href="#">Forgot password?</a>
                                </div>
                            </div>
                            <div class="mt-2">
                                <input autocomplete="current-password"
                                    class="block w-full rounded-lg border-0 py-3.5 px-4 text-secondary-dark shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:bg-slate-800 dark:text-white dark:ring-slate-700 sm:text-sm sm:leading-6"
                                    id="password" name="password" placeholder="Password" required=""
                                    type="password" />
                            </div>
                        </div>
                        <!-- Login Button -->
                        <div>
                            <button
                                class="flex w-full justify-center items-center rounded-lg bg-secondary-dark dark:bg-primary px-4 py-3.5 text-sm font-bold leading-6 text-white shadow-sm hover:opacity-90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all"
                                type="submit">
                                <span>Login</span>
                                <span class="material-symbols-outlined ml-2 text-lg">login</span>
                            </button>
                            @if ($errors->any())
                                <div class="mt-4 text-sm text-red-600 text-center">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </div>
                    </form>
                    <div class="mt-10">
                        <p class="mt-4 text-sm text-center text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('daftar') }}" class="text-green-600 hover:underline font-semibold">
                                Daftar
                            </a>
                        </p>
                    </div>

                </div>
                <p class="mt-10 text-center text-sm text-slate-accent dark:text-slate-400">
                    Not a member?
                    <a class="font-bold leading-6 text-primary hover:text-primary/80 transition-colors"
                        href="#">Join the bakery club today</a>
                </p>
            </div>
            <div class="mt-auto pt-10 text-center lg:text-left">
                <nav class="flex justify-center lg:justify-start gap-6 text-xs text-slate-400">
                    <a class="hover:text-primary" href="#">Help Center</a>
                    <a class="hover:text-primary" href="#">Privacy Policy</a>
                    <a class="hover:text-primary" href="#">Terms of Service</a>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>
