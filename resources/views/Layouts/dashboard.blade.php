@extends('Components.Menu')

@section('NavbarMenu')
    @include('Components.Navbar')
@endsection
@section('content')
<div class="relative w-full min-h-screen flex items-center justify-between px-12 bg-gradient-to-br from-pink-100 via-yellow-50 to-pink-200 overflow-hidden">

    <!-- Overlay lembut -->
    <div class="absolute inset-0 bg-gradient-to-r from-pink-200/60 via-yellow-100/60 to-pink-200/60 -z-10"></div>

    <!-- Teks Hero -->
    <div class="max-w-lg z-10 animate-fadeIn">
        <h1 class="text-6xl font-extrabold text-gray-900 mb-6 leading-snug">
            Kue <span class="text-pink-500">Lezat & Manis</span> Untuk Hari Spesialmu!
        </h1>
        <p class="text-lg text-gray-700 mb-8">
            Temukan kue favoritmu yang dibuat dengan cinta. Pesan sekarang, rasakan kelezatannya, dan buat harimu lebih manis!
        </p>
        <div class="flex gap-4">
            <a href="#produk" class="bg-pink-500 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-pink-600 transition-all duration-300">
                Beli Sekarang
            </a>
            <a href="#produk" class="border-2 border-pink-500 text-pink-500 font-semibold px-6 py-3 rounded-lg hover:bg-pink-100 transition-all duration-300">
                Lihat Produk
            </a>
        </div>
    </div>
    <div class="relative z-10 animate-bounce-slow">
        <img src="/img/Kue.jpg" alt="Kue" class="max-h-[450px] max-w-[450px] object-cover rounded-3xl shadow-2xl">
    </div>
    <div class="absolute top-0 left-0 w-full h-full -z-20">
        <div class="w-80 h-80 bg-pink-300 rounded-full absolute -top-20 -left-20 opacity-30 animate-pulse"></div>
        <div class="w-96 h-96 bg-yellow-300 rounded-full absolute -bottom-40 -right-32 opacity-20 animate-pulse"></div>
        <div class="w-64 h-64 bg-pink-400 rounded-full absolute top-1/3 right-1/4 opacity-25 blur-3xl"></div>
    </div>
</div>
 @include('Components.Card')
@endsection


