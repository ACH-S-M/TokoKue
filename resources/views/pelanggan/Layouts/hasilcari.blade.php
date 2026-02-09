@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
<div class="p-6 md:w-full mx-auto">

    {{-- Info hasil --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-slate-800">
            Menampilkan {{ $kues->count() }} produk
        </h2>
    </div>

    {{-- Grid Produk --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($kues as $kue)
            <a href="{{ route('detailproduk', $kue->KD_KUE) }}"
               class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                {{-- Image --}}
                <div class="relative w-full h-52 overflow-hidden">
                    <img src="{{ asset('img/produk/' . $kue->gambar_kue) }}"
                        alt="{{ $kue->nama_kue }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>

                {{-- Content --}}
                <div class="p-4 flex flex-col gap-3 h-full">
                    <div class="flex justify-between items-start">
                        <h3 class="text-[#0d171b] text-base font-bold line-clamp-1">
                            {{ $kue->nama_kue }}
                        </h3>
                        <span class="text-xs text-gray-500">
                            {{ $kue->jumlah_terjual }}x
                        </span>
                    </div>

                    <p class="text-gray-600 text-sm line-clamp-2">
                        {{ $kue->deskripsi_kue }}
                    </p>

                    <button
                        class="mt-auto w-full py-2.5 rounded-lg bg-primary text-slate-800 text-sm font-semibold hover:opacity-90 transition">
                        Tambah ke Keranjang
                    </button>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Jika kosong --}}
    @if ($kues->count() === 0)
        <div class="text-center py-16 text-gray-500">
            Produk tidak ditemukan 
        </div>
    @endif

</div>
@endsection
