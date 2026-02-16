
<div class="sticky top-0 z-50 w-full border-b border-solid border-[#e7eff3] bg-white/80 glass-nav">
    <div class="max-w-full mx-auto px-6 lg:px-10">
        <header class="flex items-center justify-between h-20 relative">
            <div class="flex items-center gap-12">
                {{-- Hamburger Button (Mobile Only) --}}
                <button id="hamburger-btn" class="flex flex-col gap-1.5 md:hidden z-50 relative group">
                    <span class="w-6 h-0.5 bg-[#0d171b] transition-all duration-300 origin-center"></span>
                    <span class="w-6 h-0.5 bg-[#0d171b] transition-all duration-300 origin-center"></span>
                    <span class="w-6 h-0.5 bg-[#0d171b] transition-all duration-300 origin-center"></span>
                </button>

                {{-- Logo --}}
                <div class="flex items-center gap-3 text-primary">
                    <div class="size-8">
                        <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.8261 17.4264C16.7203 18.1174 20.2244 18.5217 24 18.5217C27.7756 18.5217 31.2797 18.1174 34.1739 17.4264C36.9144 16.7722 39.9967 15.2331 41.3563 14.1648L24.8486 40.6391C24.4571 41.267 23.5429 41.267 23.1514 40.6391L6.64374 14.1648C8.00331 15.2331 11.0856 16.7722 13.8261 17.4264Z"
                                fill="currentColor"></path>
                            <path clip-rule="evenodd"
                                d="M39.998 12.236C39.9944 12.2537 39.9875 12.2845 39.9748 12.3294C39.9436 12.4399 39.8949 12.5741 39.8346 12.7175C39.8168 12.7597 39.7989 12.8007 39.7813 12.8398C38.5103 13.7113 35.9788 14.9393 33.7095 15.4811C30.9875 16.131 27.6413 16.5217 24 16.5217C20.3587 16.5217 17.0125 16.131 14.2905 15.4811C12.0012 14.9346 9.44505 13.6897 8.18538 12.8168C8.17384 12.7925 8.16216 12.767 8.15052 12.7408C8.09919 12.6249 8.05721 12.5114 8.02977 12.411C8.00356 12.3152 8.00039 12.2667 8.00004 12.2612C8.00004 12.261 8 12.2607 8.00004 12.2612C8.00004 12.2359 8.0104 11.9233 8.68485 11.3686C9.34546 10.8254 10.4222 10.2469 11.9291 9.72276C14.9242 8.68098 19.1919 8 24 8C28.8081 8 33.0758 8.68098 36.0709 9.72276C37.5778 10.2469 38.6545 10.8254 39.3151 11.3686C39.9006 11.8501 39.9857 12.1489 39.998 12.236ZM4.95178 15.2312L21.4543 41.6973C22.6288 43.5809 25.3712 43.5809 26.5457 41.6973L43.0534 15.223C43.0709 15.1948 43.0878 15.1662 43.104 15.1371L41.3563 14.1648C43.104 15.1371 43.1038 15.1374 43.104 15.1371L43.1051 15.135L43.1065 15.1325L43.1101 15.1261L43.1199 15.1082C43.1276 15.094 43.1377 15.0754 43.1497 15.0527C43.1738 15.0075 43.2062 14.9455 43.244 14.8701C43.319 14.7208 43.4196 14.511 43.5217 14.2683C43.6901 13.8679 44 13.0689 44 12.2609C44 10.5573 43.003 9.22254 41.8558 8.2791C40.6947 7.32427 39.1354 6.55361 37.385 5.94477C33.8654 4.72057 29.133 4 24 4C18.867 4 14.1346 4.72057 10.615 5.94478C8.86463 6.55361 7.30529 7.32428 6.14419 8.27911C4.99695 9.22255 3.99999 10.5573 3.99999 12.2609C3.99999 13.1275 4.29264 13.9078 4.49321 14.3607C4.60375 14.6102 4.71348 14.8196 4.79687 14.9689C4.83898 15.0444 4.87547 15.1065 4.9035 15.1529C4.91754 15.1762 4.92954 15.1957 4.93916 15.2111L4.94662 15.223L4.95178 15.2312ZM35.9868 18.996L24 38.22L12.0131 18.996C12.4661 19.1391 12.9179 19.2658 13.3617 19.3718C16.4281 20.1039 20.0901 20.5217 24 20.5217C27.9099 20.5217 31.5719 20.1039 34.6383 19.3718C35.082 19.2658 35.5339 19.1391 35.9868 18.996Z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-[#0d171b] text-xl font-extrabold leading-tight tracking-[-0.025em] uppercase">
                        Lumière</h2>
                </div>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-[#0d171b] text-sm font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                        href={{ route('home') }}>Menu</a>
                    <a class="text-[#0d171b] text-sm font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                        href="#">About</a>
                    <a class="text-[#0d171b] text-sm font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                        href="#">Contact</a>
                </nav>
            </div>

            <div class="flex items-center gap-6">
                <label class="hidden lg:flex flex-col min-w-96">
                    <div class="flex w-full rounded-full h-full p-2 items-center bg-slate-200 px-4">
                        <img src="/img/svg/cari.svg" class="w-[20px] mr-4">
                        <form action={{ route('kue.search') }} method="post" class="w-full">
                            @csrf
                            <input name="search"
                                class="form-input w-full border-none py-2 text-sm
                                focus:outline-none focus:ring-0 focus:border-transparent
                                placeholder:text-slate-400 bg-transparent"
                                placeholder="Find a treat..." />
                        </form>
                    </div>
                </label>
                <a href={{ route('Keranjang') }}
                    class="flex items-center justify-center rounded-full size-10 bg-slate-100 text-[#0d171b] dark:text-white hover:bg-primary/20 transition-all">
                    <img src="/img/svg/shopingbag.svg" class="w-[22px] cursor-pointer">
                </a>

                <div class="hidden md:flex items-center gap-3">
                    @guest('pelanggan')
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
                    @endguest
                    @auth('pelanggan')
                        <div class="relative ml-4" id="desktop-profile-container">
                            <button type="button" 
                                class="flex items-center gap-2 rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all p-1 pr-3 border border-transparent hover:bg-gray-50" 
                                id="user-menu-button" 
                                aria-expanded="false" 
                                aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <div class="h-8 w-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold overflow-hidden border border-gray-200">
                                    {{ substr(auth('pelanggan')->user()->nama_pelanggan ?? 'U', 0, 1) }}
                                </div>
                                <span class="hidden md:block font-semibold text-gray-700 text-sm max-w-[100px] truncate">{{ auth('pelanggan')->user()->nama_pelanggan }}</span>
                                <svg class="hidden md:block h-4 w-4 text-gray-500 transition-transform duration-200" id="user-menu-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        
                            <!-- Dropdown menu -->
                            <div class="absolute right-0 z-50 mt-2 w-60 origin-top-right rounded-xl bg-white py-2 shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none hidden transform opacity-0 scale-95 transition-all duration-200 ease-out" 
                                role="menu" 
                                aria-orientation="vertical" 
                                aria-labelledby="user-menu-button" 
                                tabindex="-1" 
                                id="user-menu-dropdown">
                                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50/50 rounded-t-xl">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Signed in as</p>
                                    <p class="truncate text-sm font-bold text-gray-900 mt-0.5">{{ auth('pelanggan')->user()->email ?? auth('pelanggan')->user()->nama_pelanggan }}</p>
                                </div>
                                <div class="py-1">
                                    <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors" role="menuitem" tabindex="-1">
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Your Profile
                                    </a>
                                    <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors" role="menuitem" tabindex="-1">
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        Orders
                                    </a>
                                    <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors" role="menuitem" tabindex="-1">
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Settings
                                    </a>
                                </div>
                                <form action="{{ route('pelanggan.logout') }}" method="post" class="border-t border-gray-100 py-1">
                                    @csrf
                                    <button type="submit" class="group flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors" role="menuitem" tabindex="-1">
                                        <svg class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        {{-- Mobile Menu Overlay --}}
        <div id="mobile-menu"
            class=" z-50  fixed left-0 w-full bg-white border-b border-[#e7eff3] shadow-lg flex flex-col p-0 md:hidden transition-all duration-300 origin-top transform scale-y-0 opacity-0 pointer-events-none overflow-hidden max-h-[calc(100vh-5rem)] overflow-y-auto">
            
            @auth('pelanggan')
            <div class="bg-gray-50/80 p-6 border-b border-gray-100">
                <div class="flex items-center gap-4">
                     <div class="h-14 w-14 rounded-full bg-white border-2 border-white shadow-sm flex items-center justify-center text-primary text-xl font-bold overflow-hidden">
                        {{ substr(auth('pelanggan')->user()->nama_pelanggan ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <div class="text-lg font-bold text-gray-900">{{ auth('pelanggan')->user()->nama_pelanggan }}</div>
                        <div class="text-sm text-gray-500">{{ auth('pelanggan')->user()->email ?? '' }}</div>
                    </div>
                </div>
                <div class="mt-6 flex flex-col gap-1">
                    <a href="#" class="flex items-center px-4 py-2.5 text-base font-medium text-gray-700 rounded-lg hover:bg-white hover:shadow-sm transition-all">
                        <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Your Profile
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-base font-medium text-gray-700 rounded-lg hover:bg-white hover:shadow-sm transition-all">
                        <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Riwayat Pesanan
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 text-base font-medium text-gray-700 rounded-lg hover:bg-white hover:shadow-sm transition-all">
                        <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan Akun
                    </a>
                </div>
            </div>
            @endauth

            <div class="p-6 flex flex-col gap-6">
                <nav class="flex flex-col gap-4">
                <a class="text-[#0d171b] text-base font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                    href={{ route('home') }}>Menu</a>
                <a class="text-[#0d171b] text-base font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                    href="#">About</a>
                <a class="text-[#0d171b] text-base font-semibold hover:text-primary transition-colors uppercase tracking-widest"
                    href="#">Contact</a>
            </nav>
            <div class="flex flex-col gap-4">
                <form action={{ route('kue.search') }} method="post" class="w-full">
                    @csrf
                    <div class="flex w-full rounded-full h-full p-2 items-center bg-slate-200 px-4">
                        <img src="/img/svg/cari.svg" class="w-[20px] mr-4">
                        <input name="search"
                            class="form-input w-full border-none py-2 text-sm
                            focus:outline-none focus:ring-0 focus:border-transparent
                            placeholder:text-slate-400 bg-transparent"
                            placeholder="Find a treat..." />
                    </div>
                </form>

                @guest('pelanggan')
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('login') }}"
                            class="w-full text-center px-4 py-2 rounded-lg bg-green-600 text-white
                          hover:bg-green-700 transition">
                            Login
                        </a>
                        <a href="{{ route('daftar') }}"
                            class="w-full text-center px-4 py-2 rounded-lg border border-blue-600 text-blue-600
                          hover:bg-blue-600 hover:text-white transition">
                            Daftar
                        </a>
                    </div>
                @endguest
                @auth('pelanggan')
                    <div class="flex flex-col gap-4 border-t pt-4">

                        <form action="{{ route('pelanggan.logout') }}" method="post" class="w-full">
                            @csrf
                            <button class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition shadow-sm font-medium">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const spans = btn.querySelectorAll('span');
        let isOpen = false;

        btn.addEventListener('click', () => {
            isOpen = !isOpen;

            if (isOpen) {
                // Animate to X
                spans[0].classList.add('rotate-45', 'translate-y-2');
                spans[1].classList.add('opacity-0');
                spans[2].classList.add('-rotate-45', '-translate-y-2');

                // Show menu
                menu.classList.remove('scale-y-0', 'opacity-0', 'pointer-events-none');
            } else {
                // Revert animation
                spans[0].classList.remove('rotate-45', 'translate-y-2');
                spans[1].classList.remove('opacity-0');
                spans[2].classList.remove('-rotate-45', '-translate-y-2');

                // Hide menu
                menu.classList.add('scale-y-0', 'opacity-0', 'pointer-events-none');
            }
        });

        // Desktop Profile Dropdown
        const userMenuBtn = document.getElementById('user-menu-button');
        const userMenuDropdown = document.getElementById('user-menu-dropdown');
        const userMenuChevron = document.getElementById('user-menu-chevron');

        if (userMenuBtn && userMenuDropdown) {
            userMenuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isExpanded = userMenuBtn.getAttribute('aria-expanded') === 'true';
                
                if (isExpanded) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            });

            document.addEventListener('click', (e) => {
                if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                    closeDropdown();
                }
            });
        }

        function openDropdown() {
             userMenuBtn.setAttribute('aria-expanded', 'true');
             userMenuDropdown.classList.remove('hidden', 'opacity-0', 'scale-95');
             userMenuDropdown.classList.add('opacity-100', 'scale-100');
             if (userMenuChevron) userMenuChevron.classList.add('rotate-180');
        }

        function closeDropdown() {
             userMenuBtn.setAttribute('aria-expanded', 'false');
             userMenuDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
             userMenuDropdown.classList.remove('opacity-100', 'scale-100');
             if (userMenuChevron) userMenuChevron.classList.remove('rotate-180');
        }


    });
</script>
