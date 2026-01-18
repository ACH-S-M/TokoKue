@extends('pelanggan.Components.Menu')

<style>
        body {
            font-family: "Plus Jakarta Sans", sans-serif;
        }
        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
</style>

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection
@section('content')
    <section class="py-6 px-12 ">
        <div class="@container">
            <div class="relative flex min-h-[600px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-2xl items-start justify-end p-8 @[480px]:p-16 overflow-hidden"
                data-alt="icy blue aesthetic pastry on white marble"
                style='background-image: linear-gradient(to top, rgba(16, 28, 34, 0.8) 0%, rgba(16, 28, 34, 0) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCwqe0KNo-IrBYbIDLtthOJ_SahHq-55nsI9Ym7gBvx-F_huOzMBfSasBs0szOHHQ5_gSJEraKmuc8mRV4Dj7vMvVmzG6AcXIUms-ZDK7qeTuUcOEWmVmh2wGKZ5WU0zRapVsyjiJMl-yS1ugs7kMzELIxS9jQg2d3Ernze8ZrdszzFHZrodyNVAC8C-Mm1qP-ewDYZIrZrPc2MLgmqjVKi55cXeWsVv5FpJZZ6UVMNe6rWOhhs1PMyH6G5AgSuPgAWhgjdjPMO54Q");'>
                <div class="flex flex-col gap-4 max-w-xl">
                    <h1 class="text-white text-5xl font-bold leading-[1.1] tracking-[-0.04em] @[480px]:text-7xl">
                       Kue Premium
                    </h1>
                    <p class="text-slate-200 text-lg font-light leading-relaxed max-w-md">
                        Nikmati berbagai kue premium dengan rasa yang nikmat. terbuat dari bahan pilihan
                    </p>
                    <div class="mt-4 flex gap-4">
                        <button
                            class="flex min-w-[160px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-primary text-white text-base font-bold transition-transform hover:scale-105 active:scale-95 shadow-lg shadow-primary/30">
                            <span>Shop Collection</span>
                        </button>
                        <button
                            class="flex min-w-[160px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-white/10 backdrop-blur text-white border border-white/20 text-base font-bold hover:bg-white/20 transition-all">
                            <span>The Story</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pelanggan.Components.Card')
@endsection
