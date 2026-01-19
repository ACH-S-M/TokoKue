@extends('admin.main')

@section('sidebar')
    @include('admin.components.sidebar')
@endsection
@section('content')
    <main class="flex flex-col gap-10">
        <!-- Title -->
        <div class="title">
            <h1 class="text-3xl font-bold text-slate-800">Tambah Produk</h1>
            <p class="text-slate-500 mt-1">Tambah kue baru untuk dijual</p>
        </div>
        <div class="form flex gap-8 items-center">
            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-md border p-10 w-[760px]">
                {{-- Metode form untuk menentukan apakah update atau delete  --}}
                <form method="POST" enctype="multipart/form-data" class="grid grid-cols-3 gap-8"
                    action={{ $getKue ? route('admin.update.produk', $getKue->KD_KUE) : route('admin.post.produk') }}>
                    @csrf
                    @if ($getKue)
                        @method('PUT')
                    @endif
                    <!-- LEFT: FORM -->
                    <div class="col-span-2 flex flex-col gap-6">
                        <!-- Nama Kue -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-slate-700">
                                Nama Kue <span class="text-red-500">* {{ $getKue?->nama_kue }}</span>
                            </label>
                            <input type="text" name="nama_kue" placeholder="Contoh: Brownies Coklat"
                                class="border rounded-xl px-4 py-2.5
                           focus:ring-2 focus:ring-blue-500 focus:outline-none
                           transition"
                                value="{{ old('nama_kue', $getKue?->nama_kue) }}">
                        </div>

                        <!-- Deskripsi -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-slate-700">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi_kue" rows="5"
                                placeholder="Ceritakan keunikan kue ini, rasa, tekstur, atau bahan unggulan..."
                                class="border rounded-xl px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:outline-none
                           resize-none transition">{{ old('deskripsi_kue', $getKue?->deskripsi_kue) }}</textarea>
                        </div>

                        <!-- Action -->
                        <div class="flex gap-3 pt-2">
                            <button type="submit"
                                class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
                           font-semibold hover:bg-blue-700
                           shadow-sm hover:shadow transition">
                                Simpan Produk
                            </button>

                            <a href="{{ route('admin.produk') }}"
                                class="px-6 py-2.5 rounded-xl border
                           text-slate-600 hover:bg-slate-100 transition">
                                Batal
                            </a>
                        </div>
                    </div>

                    <!-- Kanan : IMAGE UPLOAD -->
                    <div class="col-span-1 flex flex-col gap-3">
                        <label class="text-sm font-semibold text-slate-700">
                            Gambar Kue <span class="text-red-500">*</span>
                        </label>

                        <input type="file" name="gambar_kue" id="gambar_kue" accept="image/*" hidden>

                        <label for="gambar_kue"
                            class="group relative flex flex-col items-center justify-center
                       h-52 rounded-2xl border-2 border-dashed
                       cursor-pointer transition
                       hover:border-blue-500 hover:bg-blue-50">
                            <img src="/img/svg/upload.svg" class="w-12 opacity-60 group-hover:opacity-100 transition"
                                alt="Upload">

                            <span class="mt-2 text-sm text-slate-500 group-hover:text-blue-600">
                                Klik untuk upload gambar
                            </span>

                            <span class="absolute bottom-3 text-xs text-slate-400">
                                PNG, JPG max 2MB
                            </span>
                        </label>
                    </div>
                </form>
            </div>
            {{-- Preview Card --}}
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

                        <p id="previewDeskripsi" class="text-sm text-slate-500 line-clamp-3">
                            Deskripsi kue akan tampil di sini
                        </p>
                    </div>
                </div>
            </div>

        </div>
        {{-- Tabel Produk --}}
        <div class="bg-white rounded-2xl shadow-sm border p-6 w-full">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-800">Daftar Produk</h1>
                <p class="text-sm text-slate-500 mt-1">
                    Daftar produk yang sudah Anda tambahkan akan tampil di sini
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-left text-sm text-slate-600">
                            <th class="px-4 py-3 font-semibold">ID Kue</th>
                            <th class="px-4 py-3 font-semibold">Nama Kue</th>
                            <th class="px-4 py-3 font-semibold">Deskripsi</th>
                            <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($kues as $kue)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-sm text-slate-700">
                                    {{ $kue->KD_KUE }}
                                </td>

                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $kue->nama_kue }}
                                </td>

                                <td class="px-4 py-3 text-sm text-slate-600 max-w-[420px] truncate">
                                    {{ $kue->deskripsi_kue }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.edit.produk', $kue->KD_KUE) }}"
                                            class="px-3 py-1.5 text-sm rounded-lg
                                          bg-blue-100 text-blue-700
                                          hover:bg-blue-600 hover:text-white transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.delete.produk', $kue->KD_KUE) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus produk ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="px-3 py-1.5 text-sm rounded-lg
                                               bg-red-100 text-red-600
                                               hover:bg-red-600 hover:text-white transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-10 text-slate-400">
                                    Belum ada produk ditambahkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
@endsection


@push('scripts')
    <script>
        // Nama kue realtime
        const namaInput = document.querySelector('input[name="nama_kue"]');
        const previewNama = document.getElementById('previewNama');

        namaInput.addEventListener('input', function() {
            previewNama.textContent = this.value || 'Nama Kue';
        });

        // Deskripsi realtime
        const deskripsiInput = document.querySelector('textarea[name="deskripsi_kue"]');
        const previewDeskripsi = document.getElementById('previewDeskripsi');

        deskripsiInput.addEventListener('input', function() {
            previewDeskripsi.textContent =
                this.value || 'Deskripsi kue akan tampil di sini';
        });

        // Gambar realtime
        const gambarInput = document.getElementById('gambar_kue');
        const previewImage = document.getElementById('previewImage');
        const previewPlaceholder = document.getElementById('previewPlaceholder');

        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.classList.remove('hidden');
                previewPlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush
