 <?php
 $sizes = ['S', 'M', 'L', 'XL'];
 
 ?>

 <div class="min-h-screen  w-full ">
     <div class="title ">
         <h1 class="text-3xl font-bold mb-1 text-slate-800">Tambah Variasi Kue</h1>
         <h1 class="text-md text-slate-600">Tambahkan variasi kue seperti Toping, Ukuran , harga dan Lain lain</h1>
     </div>
     <div class="form flex items-center gap-8 ">
         {{-- Form Disini  --}}
         <div class="w-[760px] border rounded-2xl p-10 mt-4 min-h-[420px] bg-white">
             <form
                 action="{{ $getVariasi ? route('admin.update.variasiproduk', $getVariasi->KD_VARIASI) : route('admin.post.variasiproduk') }}"
                 method="POST" class="space-y-6">
                 @csrf
                 @if ($getVariasi)
                     @method('PUT')
                 @endif
                 {{-- Pilih Kue --}}
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Pilih Jenis Kue <span class="text-red-500">*</span>
                     </label>
                     <select name="KD_KUE" class="border rounded-lg p-2 w-1/2">
                         <option value="">Pilih Jenis Kue</option>
                         @foreach ($kues as $kue)
                             <option value="{{ $kue->KD_KUE }}"
                                 {{ old('KD_KUE', $getVariasi->KD_KUE ?? '') == $kue->KD_KUE ? 'selected' : '' }}>
                                 {{ $kue->nama_kue }}
                             </option>
                         @endforeach
                     </select>

                 </div>

                 {{-- Harga --}}
                 <div class="flex flex-col gap-2">
                     <label class="text-sm font-semibold text-slate-700">
                         Harga Produk (Rp) <span class="text-red-500">*</span>
                     </label>
                     <input type="number" name="harga_kue" id="inputHarga"
                         value="{{ old('harga_kue', $getVariasi->harga_kue ?? '') }}"
                         class="border rounded-lg p-2 w-1/2">

                     <p class="font-bold text-slate-700" id="previewHarga">
                         Format harga
                     </p>
                 </div>

                 {{-- Dimensi --}}
                 <div class="grid grid-cols-2 gap-6 w-1/2">
                     <div class="flex flex-col gap-2">
                         <label class="text-sm font-semibold text-slate-700">
                             Diameter (cm) <span class="text-red-500">*</span>
                         </label>
                         <input type="number" name="diameter_kue" class="p-2 rounded-md border"
                             value="{{ old('diameter_kue', $getVariasi->diameter_kue ?? '') }}">
                     </div>

                     <div class="flex flex-col gap-2">
                         <label class="text-sm font-semibold text-slate-700">
                             Tinggi (cm) <span class="text-red-500">*</span>
                         </label>

                         <input type="number" name="tinggi_kue" class="p-2 rounded-md border"
                             value="{{ old('tinggi_kue', $getVariasi->tinggi_kue ?? '') }}">
                     </div>
                 </div>

                 {{-- Berat --}}
                 <div class="flex flex-col gap-3 w-1/2">
                     <label class="text-sm font-semibold text-slate-700">
                         Berat Bersih Kue <span class="text-red-500">*</span>
                     </label>
                     @php
                         [$berat, $satuan] = explode(separator: ' ', string: $getVariasi->berat_bersih ?? ' ');
                     @endphp
                     <div class="flex gap-3">
                         <input type="number" name="berat_bersih" class="border p-2 rounded-md"
                             value="{{ old('berat_bersih', $berat ?? '') }}">
                         <select name="satuan_berat">
                             <option value="gram"
                                 {{ old('satuan_berat', $satuan ?? '') == 'gram' ? 'selected' : '' }}>
                                 Gram</option>
                             <option value="kg"
                                 {{ old('satuan_berat', $satuan ?? '') == 'kg' ? 'selected' : '' }}>Kg
                             </option>
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
                             <option value="{{ $size }}"
                                 {{ old('ukuran_kue', $getVariasi->ukuran_kue ?? '') == $size ? 'selected' : '' }}>
                                 {{ $size }}
                             </option>
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
                         <th class="px-4 py-3 font-semibold">Nama Kue</th>
                         <th class="px-4 py-3 font-semibold">Harga Kue</th>
                         <th class="px-4 py-3 font-semibold">Berat Bersih</th>
                         <th class="px-4 py-3 font-semibold">Diameter Kue (Cm)</th>
                         <th class="px-4 py-3 font-semibold">Tinggi Kue (Cm)</th>
                         <th class="px-4 py-3 font-semibold">Ukuran Kue</th>
                         <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                     </tr>
                 </thead>

                 <tbody class="divide-y">
                     @forelse ($kues as $kue)
                         @foreach ($kue->variasi_kue as $variasi)
                             <tr class="hover:bg-slate-50 transition">
                                 <td class="px-4 py-3 text-sm text-slate-700">
                                     {{ $variasi->KD_VARIASI }}
                                 </td>
                                 <td class="px-4 py-3 text-sm text-slate-800 font-medium">
                                     {{ $kue->nama_kue }}
                                 </td>

                                 <td class="px-4 py-3 font-medium text-slate-800">
                                     {{ $variasi->harga_kue }}
                                 </td>

                                 <td class="px-4 py-3 font-medium text-slate-800">
                                     {{ $variasi->berat_bersih }}
                                 </td>

                                 <td class="px-4 py-3 font-medium text-slate-800">
                                     {{ $variasi->diameter_kue }}
                                 </td>

                                 <td class="px-4 py-3 font-medium text-slate-800">
                                     {{ $variasi->tinggi_kue }}
                                 </td>
                                 <td class="px-4 py-3 font-medium text-slate-800">
                                     {{ $variasi->ukuran_kue }}
                                 </td>

                                 <td class="px-4 py-3 text-center">
                                     <div class="flex justify-center gap-2">
                                         <a href="{{ route('admin.edit.variasiproduk', [
                                             'KD_VARIASI' => $variasi->KD_VARIASI,
                                             'active_tab' => 'variasi_produk',
                                         ]) }}"
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
                         @endforeach
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
         const inputHarga = document.getElementById('inputHarga');
         const previewHarga = document.getElementById('previewHarga');
         const formatRupiah = (angka) =>
             new Intl.NumberFormat('id-ID', {
                 style: 'currency',
                 currency: 'IDR',
                 minimumFractionDigits: 0
             }).format(angka);

         inputHarga.addEventListener('input', () => {
             previewHarga.innerHTML = inputHarga.value ?
                 formatRupiah(inputHarga.value) :
                 'Format Harga';
         });
     </script>
 @endpush
