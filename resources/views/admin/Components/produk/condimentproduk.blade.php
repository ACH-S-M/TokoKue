 <main class="flex flex-col gap-10">
     <!-- Title -->
     <div class="title">
         <h1 class="text-3xl font-bold text-slate-800">Tambah Condiment Kue</h1>
         <p class="text-slate-500 mt-1">Tambah Rasa dan Topping sebagai Pelangkap Kue</p>
     </div>
     <div class="form flex gap-8 items-center">
         <!-- Card -->
         <div class="bg-white rounded-2xl shadow-md border p-10 w-1/2">
            <h1 class="text-xl font-bold mb-8 text-center ">Tambahkan Variasi Rasa dan Topping pada Kue</h1>
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
                             Nama Kue <span class="text-red-500">*</span>
                         </label>
                        
                        
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
             </form>
         </div>

     </div>
     {{-- Tabel Produk --}}
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
