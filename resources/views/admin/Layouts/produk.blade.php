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
                <form method="POST" enctype="multipart/form-data" class="grid grid-cols-3 gap-8">
                    @csrf

                    <!-- LEFT: FORM -->
                    <div class="col-span-2 flex flex-col gap-6">
                        <!-- Nama Kue -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-slate-700">
                                Nama Kue <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_kue" placeholder="Contoh: Brownies Coklat"
                                class="border rounded-xl px-4 py-2.5
                           focus:ring-2 focus:ring-blue-500 focus:outline-none
                           transition">
                        </div>

                        <!-- Deskripsi -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-slate-700">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" rows="5"
                                placeholder="Ceritakan keunikan kue ini, rasa, tekstur, atau bahan unggulan..."
                                class="border rounded-xl px-4 py-3
                           focus:ring-2 focus:ring-blue-500 focus:outline-none
                           resize-none transition"></textarea>
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

                    <!-- RIGHT: IMAGE UPLOAD -->
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
            <div class="w-[320px]">
                <div class="bg-white rounded-2xl shadow-md border overflow-hidden">
                    <!-- Image -->
                    <div class="h-48 bg-slate-100 flex items-center justify-center">
                        <img id="previewImage" src="/img/svg/upload.svg" class="h-full object-cover hidden">
                        <span id="previewPlaceholder" class="text-slate-400 text-sm">
                            Preview gambar
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-4 flex flex-col gap-2">
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
        const deskripsiInput = document.querySelector('textarea[name="deskripsi"]');
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
