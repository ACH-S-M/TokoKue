<?php
$sizes = ['S', 'M', 'L', 'XL'];
?>

@extends('admin.main')

@section('sidebar')
    @include('admin.components.sidebar')
@endsection

@section('content')
    <div class="min-h-screen  w-full ">
        <div class="title ">
            <h1 class="text-3xl font-bold mb-1 text-slate-800">Tambah Variasi Kue</h1>
            <h1 class="text-md text-slate-600">Tambahkan variasi kue seperti Toping, Ukuran , harga dan Lain lain</h1>
        </div>
        <div class="form flex items-center gap-8 ">
            {{-- Form Disini  --}}
            <div class="card w-[760px] border rounded-xl p-10 mt-4 min-h-[420px] ">
                <form action={{ route('admin.post.variasiproduk') }} class="w-full " method="POST">
                    @csrf
                    {{-- Kd Kue --}}
                    <div class="flex flex-col gap-2">
                        <label for="KD_KUE" class="text-sm font-semibold text-slate-700">Pilih Jenis Kue <span
                                class="text-red-500">*</span></label>
                        <select class="border w-1/2 p-2 " name="KD_KUE" id="selectKue">
                            <option>Pilih Jenis Kue</option>
                            @foreach ($kues as $kue)
                                <option value="{{ $kue->KD_KUE }}"> {{ $kue->nama_kue }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Harga Kue --}}
                    <div class="harga flex flex-col gap-2 mt-4">
                        <label for="harga_kue" class="text-sm font-semibold text-slate-700">Harga Produk (Dalam Rupiah)
                            <span class="text-red-500">*</span></label>
                        <input type="number" name="harga_kue" class="p-2 focus:ring-2 border w-1/2 "
                            placeholder="Harga Produk, contoh 90000" id="inputHarga">
                    </div>

                    {{-- Ukuran Kue --}}
                    <div class="harga flex flex-col gap-2 mt-4">
                        <label for="ukuran_kue" class="text-sm font-semibold text-slate-700"> Ukuran Kue <span
                                class="text-red-500">*</span> </label>
                        <select class="border w-1/2 p-2 " name="ukuran_kue" id="selectUkuran">
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}"> {{ $size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button
                        class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
                           font-semibold hover:bg-blue-700
                           shadow-sm hover:shadow transition mt-8">
                        Tambah Variasi Kue
                    </button>
                </form>
            </div>

            {{-- Preview Ada Disini  --}}
            <div class="w-[320px] max-h-[420px]">
                <div class="bg-white rounded-2xl  shadow-md border overflow-hidden">
                    <!-- Image -->
                    <div class="h-72 bg-slate-200 flex items-center justify-center">
                        <img id="previewImage"
                            src="{{ $getKue?->gambar_kue ? asset('img/produk/' . $getKue->gambar_kue) : asset('img/svg/upload.svg') }}"
                            class="h-full object-cover">
                    </div>

                    <!-- Content -->
                    <div class="p-4 pb-14 flex flex-col gap-2">
                        <h3 id="previewNama" class="font-semibold text-slate-800 text-lg">
                            Nama Kue
                        </h3>

                        <p id="previewDeskripsi" class="text-xl font-semibold text-slate-500 line-clamp-3">
                            Harga Akan Tampil Disini
                        </p>

                        <p id="previewUkuran" class="text-sm text-slate-500 line-clamp-3">
                            Ukuran Akan Tampil Disini
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Ambil element
        const selectKue = document.getElementById('selectKue');
        const inputHarga = document.getElementById('inputHarga');
        const selectUkuran = document.getElementById('selectUkuran');

        const previewNama = document.getElementById('previewNama');
        const previewHarga = document.getElementById('previewDeskripsi');
        const previewUkuran = document.getElementById('previewUkuran');
        const previewImage = document.getElementById('previewImage');

        // Data kue dari backend (relasi aman)
        const kueData = @json($kues);

        // Format Rupiah
        const formatRupiah = (angka) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        };

        // Saat pilih kue
        selectKue.addEventListener('change', function() {
            const selected = kueData.find(k => k.KD_KUE == this.value);

            if (!selected) return;

            previewNama.innerText = selected.nama_kue;

            if (selected.gambar_kue) {
                previewImage.src = `/img/produk/${selected.gambar_kue}`;
            } else {
                previewImage.src = `/img/svg/upload.svg`;
            }
        });

        // Saat input harga
        inputHarga.addEventListener('input', function() {
            if (!this.value) {
                previewHarga.innerText = 'Harga Akan Tampil Disini';
                return;
            }

            previewHarga.innerText = formatRupiah(this.value);
        });

        // Saat pilih ukuran
        selectUkuran.addEventListener('change', function() {
            previewUkuran.innerText = `Ukuran: ${this.value}`;
        });
    </script>
@endpush
