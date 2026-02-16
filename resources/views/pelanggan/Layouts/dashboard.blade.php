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
    <section class="py-6 px-4 md:px-12">
        <div class="@container">
            <div class="relative flex min-h-[500px] md:min-h-[600px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-2xl items-start justify-end p-6 md:p-16 overflow-hidden"
                data-alt="icy blue aesthetic pastry on white marble"
                style='background-image: linear-gradient(to top, rgba(16, 28, 34, 0.8) 0%, rgba(16, 28, 34, 0) 80%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCwqe0KNo-IrBYbIDLtthOJ_SahHq-55nsI9Ym7gBvx-F_huOzMBfSasBs0szOHHQ5_gSJEraKmuc8mRV4Dj7vMvVmzG6AcXIUms-ZDK7qeTuUcOEWmVmh2wGKZ5WU0zRapVsyjiJMl-yS1ugs7kMzELIxS9jQg2d3Ernze8ZrdszzFHZrodyNVAC8C-Mm1qP-ewDYZIrZrPc2MLgmqjVKi55cXeWsVv5FpJZZ6UVMNe6rWOhhs1PMyH6G5AgSuPgAWhgjdjPMO54Q");'>
                <div class="flex flex-col gap-4 max-w-xl w-full">
                    <h1 class="text-white text-3xl md:text-5xl font-bold leading-[1.1] tracking-[-0.04em] @[480px]:text-7xl">
                        Kue Premium
                    </h1>
                    <p class="text-slate-200 text-base md:text-lg font-light leading-relaxed max-w-md">
                        Nikmati berbagai kue premium dengan rasa yang nikmat. terbuat dari bahan pilihan
                    </p>
                    <div class="mt-4 flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <button
                            class="flex w-full sm:w-auto min-w-[160px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-primary text-white text-base font-bold transition-transform hover:scale-105 active:scale-95 shadow-lg shadow-primary/30">
                            <span>Shop Collection</span>
                        </button>
                        <button
                            class="flex w-full sm:w-auto min-w-[160px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-white/10 backdrop-blur text-white border border-white/20 text-base font-bold hover:bg-white/20 transition-all">
                            <span>The Story</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Card Item --}}
    <section class="md:px-12 px-6 py-6">
        <h1 class="font-bold text-2xl mb-8">Kue Terpopuler Kami</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($terpopuler as $populer)
                <a href={{ route('detailproduk',$populer->KD_KUE) }}>
                    <div class="group bg-white rounded-2xl shadow-xl hover:scale-105 transition-shadow overflow-hidden">

                    {{-- Image --}}
                    <div class="relative w-full h-56 overflow-hidden">
                        <img src="{{ asset('img/produk/' . $populer->gambar_kue) }}" alt="{{ $populer->nama_kue }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>

                    {{-- Content --}}
                    <div class="p-4 flex flex-col gap-3">
                        <div class="flex justify-between items-start">
                            <h3 class="text-[#0d171b] text-lg font-bold">
                                {{ $populer->nama_kue }}
                            </h3>
                            <p class="text-slate-800 text-sm font-thin">
                                {{ $populer->jumlah_terjual }}X Terjual
                            </p>
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                            {{ $populer->deskripsi_kue }}
                        </p>

                        <button
                            class="mt-auto w-full py-3 border border-slate-700 rounded-lg bg-primary text-slate-800 text-sm font-semibold  transition-colors">
                            Tambah Ke keranjang
                        </button>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
