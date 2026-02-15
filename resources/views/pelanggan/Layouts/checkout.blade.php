@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <form action="{{ route('pesanan.post') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                    {{-- ================= RIGHT (Summary) ================= --}}
                    <div class="order-1 lg:order-2 md:pt-24">
                        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 lg:sticky lg:top-24">

                            <h2 class="text-lg font-semibold text-gray-800 mb-6">
                                Ringkasan Pesanan
                            </h2>

                            <div class="space-y-4 max-h-72 overflow-y-auto pr-2">

                                @foreach ($keranjang as $item)
                                    @php
                                        $basePrice = $item->variasi_kue_keranjang->harga_kue;
                                        $toppingPrice = $item->topping->sum('biaya_tambahan');
                                        $itemTotal = ($basePrice + $toppingPrice) * $item->qty;
                                    @endphp

                                    <div class="flex justify-between text-sm border-b pb-2">
                                        <div>
                                            <p class="font-medium text-gray-700">
                                                {{ $item->variasi_kue_keranjang->kue->nama_kue }}
                                            </p>
                                            <p class="text-gray-400 text-xs">
                                                x{{ $item->qty }}
                                            </p>
                                        </div>
                                        <p class="font-medium text-gray-700">
                                            Rp {{ number_format($itemTotal, 0, ',', '.') }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>

                            <hr class="my-5">

                            <div class="flex justify-between items-center mb-6">
                                <span class="text-base font-semibold text-gray-800">
                                    Total Pembayaran
                                </span>
                                <span class="text-xl font-bold text-indigo-600">
                                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Tombol Mobile --}}
                            <button type="submit"
                                class="lg:hidden w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                                Lanjut ke Pembayaran
                            </button>

                        </div>
                    </div>

                    {{-- ================= LEFT (Form) ================= --}}
                    <div class="lg:col-span-2 space-y-8 order-2 lg:order-1">

                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">
                                Detail Pengiriman
                            </h1>
                            <p class="text-gray-500 mt-1">
                                Pastikan data alamat kamu sudah benar ya
                            </p>
                        </div>

                        {{-- Informasi Penerima --}}
                        <form action={{ route('pesanan.post') }} method="POST">
                            @csrf
                            <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 space-y-6">

                                <h2 class="text-lg font-semibold text-gray-700">
                                    Informasi Penerima
                                </h2>

                                <label for="name_penerima">Nama Penerima : </label>
                                <input type="text" name="nama_penerima" required placeholder="Nama Penerima"
                                    class="w-full rounded-sm p-2  border-gray-300 border-2 mt-4 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                                <label for="alamat_spesifik">Alamat Penerima : </label>
                                <textarea rows="3" name="alamat_spesifik" required placeholder="Alamat Lengkap"
                                    class="w-full rounded-sm p-2 border-2 mt-4 border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <input type="text" name="kota" required placeholder="Kota"
                                        class="rounded-sm border-2 p-2 border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                    <input type="text" name="provinsi" required placeholder="Provinsi"
                                        class="rounded-sm border-2 p-2 border-gray-300 focus:ring-2 focus:ring-indigo-500">

                                    <input type="text" name="kode_pos" required placeholder="Kode Pos"
                                        class="rounded-sm border-2 p-2 border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                </div>

                                <label for="catatan">Catatan (Opsional) : </label>
                                <textarea rows="3" name="catatan" placeholder="Catatan tambahan untuk pesanan"
                                    class="w-full rounded-sm p-2 border-2 mt-4 border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>

                            {{-- Tombol Desktop --}}
                            <button type="submit"
                                class="hidden lg:block w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                                Lanjut ke Pembayaran
                            </button>
                        </form>
                    </div>
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
            </form>
        </div>
    </div>
@endsection
