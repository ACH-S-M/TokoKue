@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
    <section class="max-w-6xl mx-auto px-8 py-12">
        <form action={{ route('Keranjang.store', ['KD_PRODUK' => $thisproduk->KD_KUE]) }} method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-24">
                {{-- Image --}}
                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('img/produk/' . $thisproduk->gambar_kue) }}" alt="{{ $thisproduk->nama_kue }}"
                        class="w-full h-[420px] object-cover">
                </div>

                {{-- Info --}}
                <div class="flex flex-col gap-6">
                    <h1 class="text-4xl font-bold text-slate-900">
                        {{ $thisproduk->nama_kue }}
                    </h1>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $thisproduk->deskripsi_kue }}
                    </p>

                    {{-- Harga --}}
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Harga</p>
                        <h2 id="price" class="text-3xl font-bold text-primary">
                            Rp {{ number_format($thisproduk->variasi_kue?->first()->harga_kue, 0, ',', '.') }}
                        </h2>
                    </div>

                    {{-- Ukuran --}}
                    <div>
                        <p class="text-sm font-semibold mb-3">Pilih Ukuran</p>
                        <div class="flex gap-3 flex-wrap">
                            @foreach ($thisproduk->variasi_kue as $variasi)
                                <label class="cursor-pointer">
                                    <input type="radio" name="KD_VARIASI" value="{{ $variasi->KD_VARIASI }}"
                                        data-harga="{{ $variasi->harga_kue }}" class="hidden peer"
                                        {{ $loop->first ? 'checked' : '' }}>
                                    <div
                                        class="px-5 py-2 rounded-full border border-gray-300
                                peer-checked:bg-primary peer-checked:text-white peer-checked:font-semibold peer-checked:bg-blue-600
                                peer-checked:border-primary
                                transition-all">
                                        {{ $variasi->ukuran_kue }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Button --}}

                    <button
                        class="mt-6 w-full h-14 rounded-xl bg-primary text-white bg-blue-500 font-semibold
                            hover:bg-primary/90 transition"
                        type="submit">
                        Tambah Ke keranjang
                    </button>
        </form>
        </div>
        </div>
    </section>

    {{-- Script --}}
    <script>
        const radios = document.querySelectorAll('input[name="KD_VARIASI"]')
        const priceEl = document.getElementById('price')

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                const harga = this.dataset.harga
                priceEl.innerText =
                    'Rp ' + Number(harga).toLocaleString('id-ID')
            })
        })
    </script>
@endsection
