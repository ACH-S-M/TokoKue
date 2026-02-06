@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection
@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-2xl font-semibold mb-6">🛒 Keranjang Saya</h2>

        {{-- GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT : LIST KERANJANG --}}
            <div class="lg:col-span-2 space-y-4">

                @forelse ($keranjang as $item)
                    <div class="bg-white rounded-2xl border shadow-sm hover:shadow-md transition">
                        <div class="p-4 flex gap-4">

                            {{-- Gambar --}}
                            <div class="w-28 h-28 flex-shrink-0">
                                <img
                                    src="{{ asset('/img/produk/' . $item->variasi_kue_keranjang->kue->gambar_kue) }}"
                                    alt="{{ $item->variasi_kue_keranjang->kue->nama_kue }}"
                                    class="w-full h-full object-cover rounded-xl"
                                />
                            </div>

                            {{-- Info --}}
                            <div class="flex-1 flex flex-col justify-between">

                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $item->variasi_kue_keranjang->kue->nama_kue }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        Ukuran: {{ $item->variasi_kue_keranjang->ukuran_kue }}
                                    </p>
                                </div>

                                {{-- Bottom row --}}
                                <div class="flex items-center justify-between mt-3">

                                    {{-- Qty --}}
                                    <div class="flex items-center gap-3">
                                        <button
                                            class="w-9 h-9 rounded-full border text-gray-600 hover:bg-gray-100 transition">
                                            −
                                        </button>

                                        <input
                                            type="number"
                                            value="{{ $item->qty }}"
                                            readonly
                                            class="w-12 h-9 border rounded text-center bg-gray-50 appearance-none"
                                        />

                                        <button
                                            class="w-9 h-9 rounded-full border text-gray-600 hover:bg-gray-100 transition">
                                            +
                                        </button>
                                    </div>

                                    {{-- Price & delete --}}
                                    <div class="flex items-center gap-6">
                                        <span class="font-semibold text-gray-800">
                                            Rp {{ number_format($item->variasi_kue_keranjang->harga_kue, 0, ',', '.') }}
                                        </span>

                                        <button class="text-sm text-red-500 hover:text-red-600">
                                            Hapus
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-blue-50 text-blue-600 rounded-lg p-4 text-center">
                        Keranjang masih kosong 😢
                    </div>
                @endforelse
            </div>

            {{-- RIGHT : CHECKOUT --}}
            @if (count($keranjang))
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border shadow-sm p-6 sticky top-6">

                        <h3 class="text-lg font-semibold mb-4">Ringkasan Belanja</h3>

                        <div class="flex justify-between mb-2 text-gray-600">
                            <span>Total Item</span>
                            <span>{{ $keranjang->sum('qty') }}</span>
                        </div>

                        <div class="flex justify-between mb-4 text-gray-800 font-semibold">
                            <span>Total Harga</span>
                            <span class="text-blue-600">
                                Rp {{ number_format(
                                    $keranjang->sum(fn($i) => $i->qty * $i->variasi_kue_keranjang->harga_kue),
                                    0, ',', '.'
                                ) }}
                            </span>
                        </div>

                        <button
                            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                            Checkout
                        </button>

                        <p class="text-xs text-gray-400 text-center mt-3">
                            Aman & terpercaya ✨
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
