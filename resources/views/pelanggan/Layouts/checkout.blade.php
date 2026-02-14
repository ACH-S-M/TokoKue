@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-14">
        <div class="max-w-7xl mx-auto px-4">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- ================= LEFT ================= --}}
                <div class="lg:col-span-2 space-y-8">

                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">
                            Detail Pengiriman
                        </h1>
                        <p class="text-gray-500 mt-1">
                            Pastikan data alamat kamu sudah benar ya
                        </p>
                    </div>

                    {{-- Informasi --}}
                    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 space-y-6">
                        <form action="">

                            <h2 class="text-lg font-semibold text-gray-700">
                                Informasi Penerima
                            </h2>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-600 ">
                                    Nama Penerima
                                </label>
                                <input type="text" name="nama_penerima"
                                    class="w-full rounded-xl border-black border-2 p-2 mt-2  focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition"
                                    placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-600">
                                    Alamat Lengkap
                                </label>
                                <textarea rows="3" name="alamat_spesifik"
                                    class="w-full rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="Nama jalan, nomor rumah, patokan, dll"></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <input type="text" placeholder="Kota" name="kota"
                                    class="rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                                <input type="text" placeholder="Provinsi" name="provinsi"
                                    class="rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                                <input type="text" placeholder="Kode Pos" name="kode_pos"
                                    class="rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </form>
                    </div>

                    {{-- Pengiriman --}}
                    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 space-y-4">

                        <h2 class="text-lg font-semibold text-gray-700">
                            Metode Pengiriman
                        </h2>

                        <label
                            class="relative block border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="shipping" value="5000" class="peer hidden">

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">Reguler (3–5 hari)</p>
                                    <p class="text-sm text-gray-500">Hemat & aman</p>
                                </div>
                                <span class="font-semibold text-indigo-600">
                                    Rp 5.000
                                </span>
                            </div>

                            <div class="absolute inset-0 rounded-xl border-2 border-indigo-600 hidden peer-checked:block">
                            </div>
                        </label>

                        <label
                            class="relative block border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="shipping" value="15000" class="peer hidden">

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">Instant (1–2 jam)</p>
                                    <p class="text-sm text-gray-500">Super cepat ⚡</p>
                                </div>
                                <span class="font-semibold text-indigo-600">
                                    Rp 15.000
                                </span>
                            </div>

                            <div class="absolute inset-0 rounded-xl border-2 border-indigo-600 hidden peer-checked:block">
                            </div>
                        </label>
                    </div>

                    {{-- Voucher --}}
                    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 space-y-4">
                        <h2 class="text-lg font-semibold text-gray-700">
                            Punya Voucher?
                        </h2>

                        <div class="flex gap-3">
                            <input type="text" placeholder="Masukkan kode voucher"
                                class="flex-1 rounded-xl border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                            <button
                                class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition shadow">
                                Terapkan
                            </button>
                        </div>
                    </div>

                </div>

                {{-- ================= RIGHT ================= --}}
               

            </div>
        </div>
    </div>
@endsection
