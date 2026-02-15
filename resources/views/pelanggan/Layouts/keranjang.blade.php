@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-3xl font-bold text-gray-800 mb-8">
                Keranjang Saya
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- LEFT --}}
                <div class="lg:col-span-2 space-y-6">

                    @forelse ($keranjang as $item)
                        <div
                            class="bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                            <div class="p-4 md:p-6 flex flex-col md:flex-row gap-4 md:gap-6">

                                {{-- Image --}}
                                <div class="w-full md:w-32 h-48 md:h-32 flex-shrink-0">
                                    <img src="{{ asset('/img/produk/' . $item->variasi_kue_keranjang->kue->gambar_kue) }}"
                                        class="w-full h-full object-cover rounded-2xl shadow-sm" />
                                </div>

                                {{-- Content --}}
                                <div class="flex-1 flex flex-col justify-between">

                                    <div>
                                        <h3 class="text-lg md:text-xl font-semibold text-gray-800">
                                            {{ $item->variasi_kue_keranjang->kue->nama_kue }}
                                        </h3>

                                        <span
                                            class="inline-block mt-2 px-3 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">
                                            Ukuran: {{ $item->variasi_kue_keranjang->ukuran_kue }}
                                        </span>

                                        {{-- Rasa --}}
                                        @if ($item->rasa->count() > 0)
                                            <div class="mt-2">
                                                <p class="text-xs text-gray-500 mb-1">Rasa:</p>
                                                <div class="flex gap-2 flex-wrap">
                                                    @foreach ($item->rasa as $r)
                                                        <span
                                                            class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                                            {{ $r->nama_rasa }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Topping --}}
                                        @if ($item->topping->count() > 0)
                                            <div class="mt-2">
                                                <p class="text-xs text-gray-500 mb-1">Topping:</p>
                                                <div class="flex gap-2 flex-wrap">
                                                    @foreach ($item->topping as $t)
                                                        <span
                                                            class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
                                                            {{ $t->nama_topping }} (+Rp
                                                            {{ number_format($t->biaya_tambahan, 0, ',', '.') }})
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Bottom Section --}}
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-5">

                                        {{-- Qty --}}
                                        <div class="flex items-center bg-gray-50 rounded-full px-2 py-1 shadow-inner w-fit">
                                            <form action="{{ route('keranjang.update', $item->KD_VARIASI) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="qty_change" value="-1">
                                                <button type="submit"
                                                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 transition">
                                                    -
                                                </button>
                                            </form>

                                            <span class="w-10 text-center font-semibold">
                                                {{ $item->qty }}
                                            </span>

                                            <form action="{{ route('keranjang.update', $item->KD_VARIASI) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="qty_change" value="1">
                                                <button type="submit"
                                                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 transition">
                                                    +
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Price --}}
                                        @php
                                            $basePrice = $item->variasi_kue_keranjang->harga_kue;
                                            $toppingPrice = $item->topping->sum('biaya_tambahan');
                                            $itemTotal = ($basePrice + $toppingPrice) * $item->qty;
                                        @endphp

                                        <div class="text-left md:text-right">
                                            <p class="text-sm text-gray-500">
                                                Harga Kue: Rp {{ number_format($basePrice, 0, ',', '.') }}
                                            </p>

                                            @if ($toppingPrice > 0)
                                                <p class="text-sm text-gray-500">
                                                    Topping: Rp {{ number_format($toppingPrice, 0, ',', '.') }}
                                                </p>
                                            @endif

                                            <p class="text-lg font-bold text-blue-600 mt-1">
                                                Total: Rp {{ number_format($itemTotal, 0, ',', '.') }}
                                            </p>
                                        </div>

                                        {{-- Delete --}}
                                        <form action="{{ route('keranjang.delete', $item->KD_VARIASI) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-400 hover:text-red-600 text-sm font-medium transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="bg-white rounded-3xl p-10 text-center shadow-sm border">
                            <p class="text-gray-500 text-lg">Keranjang masih kosong</p>
                            <a href="/"
                                class="mt-4 inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition">
                                Belanja Sekarang
                            </a>
                        </div>
                    @endforelse
                </div>

                {{-- RIGHT --}}
                @if (count($keranjang))
                    <div>
                        <div class="bg-white rounded-3xl shadow-lg p-8  border border-gray-100 sticky top-30">

                            <h3 class="text-xl font-bold mb-6 text-gray-800">
                                Ringkasan Belanja
                            </h3>

                            <div class="flex justify-between text-gray-600 mb-3">
                                <span>Total Item</span>
                                <span class="font-semibold">{{ $keranjang->sum('qty') }}</span>
                            </div>

                            <div class="flex justify-between text-gray-800 font-bold text-lg mb-6">
                                <span>Total Harga</span>
                                @php
                                    $grandTotal = $keranjang->sum(function ($item) {
                                        $basePrice = $item->variasi_kue_keranjang->harga_kue;
                                        $toppingPrice = $item->topping->sum('biaya_tambahan');
                                        return ($basePrice + $toppingPrice) * $item->qty;
                                    });
                                @endphp
                                <span class="text-blue-600">
                                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                </span>
                            </div>

                            <form action={{ route('pesanan.add') }}>
                                @csrf
                                <button
                                    type="submit"
                                    class="w-full bg-blue-600 text-white py-4 rounded-2xl font-semibold text-lg hover:bg-blue-700 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 shadow-md">
                                    Checkout Sekarang
                                </button>
                            </form>

                            <p class="text-xs text-gray-400 text-center mt-4">
                                Transaksi aman & terpercaya ✨
                            </p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
