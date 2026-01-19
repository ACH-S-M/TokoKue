@extends('admin.main')

@section('sidebar')
    @include('admin.Components.sidebar')
@endsection
@section('content')
<div class="flex flex-col gap-6">

    <!-- Page Title -->
    <div>
        <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
        <p class="text-slate-500">Ringkasan sistem hari ini</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Total User</p>
            <h2 class="text-3xl font-bold text-slate-800">1,245</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Total Jenis Kue</p>
            <h2 class="text-3xl font-bold text-slate-800">{{ $dataProduk }}</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Transaksi</p>
            <h2 class="text-3xl font-bold text-slate-800">876</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-slate-500">Pendapatan</p>
            <h2 class="text-3xl font-bold text-green-600">Rp 12.5jt</h2>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Table -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-slate-500 border-b">
                        <th class="pb-2">User</th>
                        <th class="pb-2">Tanggal</th>
                        <th class="pb-2">Status</th>
                        <th class="pb-2 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2">Achaia</td>
                        <td>2026-01-16</td>
                        <td class="text-green-600">Success</td>
                        <td class="text-right">Rp 250.000</td>
                    </tr>
                    <tr>
                        <td class="py-2">User X</td>
                        <td>2026-01-15</td>
                        <td class="text-yellow-500">Pending</td>
                        <td class="text-right">Rp 120.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Activity -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Aktivitas</h3>
            <ul class="space-y-3 text-sm text-slate-600">
                <li>✔ User baru mendaftar</li>
                <li>✔ Produk ditambahkan</li>
                <li>✔ Transaksi berhasil</li>
            </ul>
        </div>

    </div>

</div>
@endsection
