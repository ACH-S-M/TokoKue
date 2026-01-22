 <?php
 $sizes = ['S', 'M', 'L', 'XL'];
 $rasas = ['nanas','strawbery','coklat'];
 ?>

 <div class="min-h-screen  w-full ">
     <div class="title ">
         <h1 class="text-3xl font-bold mb-1 text-slate-800">Tambah Variasi Kue</h1>
         <h1 class="text-md text-slate-600">Tambahkan variasi kue seperti Toping, Ukuran , harga dan Lain lain</h1>
     </div>
     <div class="form flex items-center gap-8 ">
         {{-- Form Disini  --}}
         <div class="w-[760px] border rounded-2xl p-10 mt-4 min-h-[420px] bg-white">
             <form action="{{ route('admin.post.variasiproduk') }}" method="POST" class="space-y-6">
                 @csrf

                 {{-- Pilih Kue --}}
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Pilih Jenis Kue <span class="text-red-500">*</span>
                     </label>
                     <select name="KD_KUE" class="border rounded-lg p-2 w-1/2">
                         <option value="">Pilih Jenis Kue</option>
                         @foreach ($kues as $kue)
                             <option value="{{ $kue->KD_KUE }}">{{ $kue->nama_kue }}</option>
                         @endforeach
                     </select>
                 </div>

                 {{-- Harga --}}
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Harga Produk (Rp) <span class="text-red-500">*</span>
                     </label>
                     <input type="number" name="harga_kue"
                         class="border rounded-lg p-2 w-1/2 focus:ring-2 focus:ring-blue-500"
                         placeholder="Contoh: 90000">
                 </div>

                 {{-- Dimensi --}}
                 <div class="grid grid-cols-2 gap-6 w-1/2">
                     <div class="flex flex-col gap-2">
                         <label class="text-sm font-semibold text-slate-700">
                             Diameter (cm) <span class="text-red-500">*</span>
                         </label>
                         <input type="number" name="diameter_kue" class="border rounded-lg p-2"
                             placeholder="Contoh: 15">
                     </div>

                     <div class="flex flex-col gap-2">
                         <label class="text-sm font-semibold text-slate-700">
                             Tinggi (cm) <span class="text-red-500">*</span>
                         </label>
                         <input type="number" name="tinggi_kue" class="border rounded-lg p-2" placeholder="Contoh: 7">
                     </div>
                 </div>

                 {{-- Berat --}}
                 <div class="flex flex-col gap-3 w-1/2">
                     <label class="text-sm font-semibold text-slate-700">
                         Berat Bersih Kue <span class="text-red-500">*</span>
                     </label>

                     <div class="flex gap-3">
                         <input type="number" name="berat_bersih" class="border rounded-lg p-2 flex-1"
                             placeholder="Contoh: 600">
                         <select name="satuan_berat" class="border rounded-lg p-2">
                             <option value="gram">Gram</option>
                             <option value="kg">Kg</option>
                         </select>
                     </div>
                 </div>

                 {{-- Ukuran --}}
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Ukuran Kue <span class="text-red-500">*</span>
                     </label>
                     <select name="ukuran_kue" class="border rounded-lg p-2 w-1/2">
                         @foreach ($sizes as $size)
                             <option value="{{ $size }}">{{ $size }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Rasa Kue <span class="text-red-500">*</span>
                     </label>
                     <select name="ukuran_kue" class="border rounded-lg p-2 w-1/2">
                         @foreach ($rasas as $rasa)
                             <option value="{{ $rasa }}">{{ $rasa }}</option>
                         @endforeach
                     </select>
                 </div>

                 {{-- Submit --}}
                 <button
                     class="mt-6 px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold
                   hover:bg-blue-700 shadow hover:shadow-md transition">
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
     {{-- Tabel disini  --}}
     <div class="bg-white rounded-2xl shadow-sm p-6 w-full">
         <!-- Header -->
         <div class="mb-6">
             <h1 class="text-2xl font-bold text-slate-800">Daftar Produk</h1>
             <p class="text-sm text-slate-500 mt-1">
                 Daftar produk yang sudah Anda tambahkan akan tampil di sini
             </p>
         </div>

         <!-- Table -->
         <div class="overflow-x-auto mt-12">
             <table class="w-full border-collapse">
                 <thead>
                     <tr class="bg-slate-50 text-left text-sm text-slate-600">
                         <th class="px-4 py-3 font-semibold">Kode Variasi</th>
                         <th class="px-4 py-3 font-semibold">Harga Kue</th>
                         <th class="px-4 py-3 font-semibold">Berat Bersih</th>
                         <th class="px-4 py-3 font-semibold">Diameter Kue</th>
                         <th class="px-4 py-3 font-semibold">Tinggi Kue</th>
                         <th class="px-4 py-3 font-semibold">Rasa</th>
                         <th class="px-4 py-3 font-semibold">Ukuran Kue</th>
                         <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                     </tr>
                 </thead>

                 <tbody class="divide-y">
                     @forelse ($variasikues as $variasi)
                         <tr class="hover:bg-slate-50 transition">
                             <td class="px-4 py-3 text-sm text-slate-700">
                                 {{ $variasi->KD_VARIASI }}
                             </td>

                             <td class="px-4 py-3 font-medium text-slate-800">
                                 {{ $kue->na }}
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
                             <td colspan="8" class="text-center py-10 text-slate-400">
                                 Belum ada produk ditambahkan
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>

 </div>


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
