@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <form action="{{ route('Keranjang.store', ['KD_PRODUK' => $thisproduk->KD_KUE]) }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20">

            {{-- IMAGE --}}
            <div class="rounded-3xl overflow-hidden shadow-xl bg-white">
                <img
                    src="{{ asset('img/produk/' . $thisproduk->gambar_kue) }}"
                    alt="{{ $thisproduk->nama_kue }}"
                    class="w-full h-[420px] object-cover hover:scale-105 transition duration-300"
                >
            </div>

            {{-- INFO --}}
            <div class="flex flex-col gap-8">

                {{-- TITLE --}}
                <div>
                    <h1 class="text-4xl font-extrabold text-slate-900">
                        {{ $thisproduk->nama_kue }}
                    </h1>
                    <p class="text-gray-500 mt-1">
                        Produk fresh & dibuat dengan bahan terbaik
                    </p>
                </div>

                {{-- DESKRIPSI --}}
                <div class="space-y-2">
                    <p class="font-semibold text-slate-900">Deskripsi Produk</p>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $thisproduk->deskripsi_kue }}
                    </p>
                </div>

                {{-- SPESIFIKASI --}}
                <div class="space-y-3">
                    <p class="font-semibold text-slate-900">Spesifikasi</p>

                    <div class="grid grid-cols-3 gap-4 bg-slate-50 rounded-xl p-4 text-center">
                        <div>
                            <p class="text-xs text-gray-500">Diameter</p>
                            <p id="diameter_kue" class="font-semibold text-slate-800">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Tinggi</p>
                            <p id="tinggi_kue" class="font-semibold text-slate-800">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Berat</p>
                            <p id="bb" class="font-semibold text-slate-800">-</p>
                        </div>
                    </div>
                </div>

                {{-- HARGA --}}
                <div class="border-l-4 border-blue-600 pl-4">
                    <p class="text-sm uppercase tracking-wide text-gray-500">Harga</p>
                    <h2 id="price" class="text-3xl font-bold text-blue-600">
                        Rp {{ number_format($thisproduk->variasi_kue?->first()->harga_kue, 0, ',', '.') }}
                    </h2>
                </div>

                {{-- VARIASI --}}
                <div class="space-y-3">
                    <p class="font-semibold text-slate-900">Pilih Ukuran</p>

                    <div class="flex gap-3 flex-wrap">
                        @foreach ($thisproduk->variasi_kue as $variasi)
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="KD_VARIASI"
                                    value="{{ $variasi->KD_VARIASI }}"
                                    class="hidden peer"
                                    data-harga="{{ $variasi->harga_kue }}"
                                    data-berat="{{ $variasi->berat_bersih }}"
                                    data-tinggi="{{ $variasi->tinggi_kue }}"
                                    data-diameter="{{ $variasi->diameter_kue }}"
                                    {{ $loop->first ? 'checked' : '' }}
                                >

                                <div class="
                                    px-5 py-2 rounded-full border border-gray-300
                                    peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600
                                    hover:border-blue-500
                                    transition-all duration-200
                                ">
                                    {{ $variasi->ukuran_kue }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- CTA --}}
                <button
                    type="submit"
                    class="mt-6 w-full h-14 rounded-xl bg-blue-600 text-white font-semibold
                    hover:bg-blue-700 active:scale-[0.98] transition
                    flex items-center justify-center gap-2"
                >
                    🛒 Tambah ke Keranjang
                </button>

            </div>
        </div>
    </form>
</section>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const priceEl = document.getElementById('price')
    const beratEl = document.getElementById('bb')
    const diameterEl = document.getElementById('diameter_kue')
    const tinggiEl = document.getElementById('tinggi_kue')

    function updateUI(radio) {
        priceEl.innerText = 'Rp ' + Number(radio.dataset.harga).toLocaleString('id-ID')
        diameterEl.innerText = radio.dataset.diameter + ' Cm'
        tinggiEl.innerText = radio.dataset.tinggi + ' Cm'
        beratEl.innerText = radio.dataset.berat
    }

    document.querySelectorAll('input[name="KD_VARIASI"]').forEach(radio => {
        radio.addEventListener('change', () => updateUI(radio))
    })

    const checked = document.querySelector('input[name="KD_VARIASI"]:checked')
    if (checked) updateUI(checked)
})
</script>
@endsection
