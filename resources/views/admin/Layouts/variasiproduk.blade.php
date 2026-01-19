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
        <div class="form flex items-center gap-8 min-h-[150px]">
            {{-- Form Disini  --}}
            <div class="card w-[760px] border rounded-xl p-10 mt-4 ">
                <form action="" class="w-full ">

                    {{-- Kd Kue --}}
                    <div class="flex flex-col gap-2">
                        <label for="KD_KUE" class="text-sm font-semibold text-slate-700">Pilih Jenis Kue <span
                                class="text-red-500">*</span></label>
                        <select class="border w-1/2 p-2 " name="KD_KUE">
                            @foreach ($kues as $kue)
                                <option value="{{ $kue->KD_KUE }}"> {{ $kue->nama_kue  }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Harga Kue --}}
                    <div class="harga flex flex-col gap-2 mt-4">
                        <label for="harga_kue" class="text-sm font-semibold text-slate-700">Harga Produk (Dalam Rupiah)
                            <span class="text-red-500">*</span></label>
                        <input type="number" name="harga_kue" class="p-2 focus:ring-2 border w-1/2 "
                            placeholder="Harga Produk, contoh 90000">
                    </div>

                    {{-- Ukuran Kue --}}
                    <div class="harga flex flex-col gap-2 mt-4">
                        <label for="ukuran_kue" class="text-sm font-semibold text-slate-700"> Ukuran Kue <span
                                class="text-red-500">*</span> </label>
                        <select class="border w-1/2 p-2 " name="KD_KUE">
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}"> {{ $size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
                           font-semibold hover:bg-blue-700
                           shadow-sm hover:shadow transition mt-8">
                        Tambah Variasi Kue
                    </button>
                </form>
            </div>

            {{-- Preview Ada Disini  --}}


        </div>
    </div>
@endsection
