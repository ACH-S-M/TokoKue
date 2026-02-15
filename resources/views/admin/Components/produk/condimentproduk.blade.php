 <main class="flex flex-col gap-10">
     <!-- Title -->
     <div class="heads flex justify-between items-center">
         <div class="title">
             <h1 class="text-3xl font-bold text-slate-800">Tambah Condiment Kue</h1>
             <p class="text-slate-500 mt-1">Tambah Rasa dan Topping sebagai Pelangkap Kue</p>
         </div>
         <div class="btn">
             <div class="flex gap-3">
                 <button onclick="openModal('topping')" class="px-4 py-2 bg-blue-600 text-white rounded">
                     Tambah Topping
                 </button>

                 <button onclick="openModal('rasa')" class="px-4 py-2 bg-green-600 text-white rounded">
                     Tambah Rasa
                 </button>
             </div>
         </div>
     </div>
     <div class="form flex gap-8 items-center">
         <!-- Card -->
         <div class="bg-white rounded-2xl shadow-md border p-10 w-9/12">
             <h1 class="text-xl font-bold mb-8 text-center ">Tambahkan Variasi Rasa dan Topping pada Kue</h1>
             {{-- Metode form untuk menentukan apakah update atau delete  --}}
             <form method="POST" enctype="multipart/form-data" class="grid grid-cols-3 gap-8"
                 action={{ route('admin.post.condimentwithvariasi') }}>
                 @csrf
                 <!-- LEFT: FORM -->
                 <div class="col-span-2 flex flex-col gap-6">
                     <!-- Nama Kue -->
                     <div class="flex flex-col gap-1">
                         <label class="text-sm font-semibold text-slate-700">
                             Pilih Kue <span class="text-red-500">*</span>
                         </label>
                         <select name="pilihan_kue" class="border rounded px-3 py-2">
                             @foreach ($kues as $kue)
                                 <option value="{{ $kue->KD_KUE }}">{{ $kue->nama_kue }}</option>
                             @endforeach
                         </select>
                     </div>


                     {{-- Pilihan Rasa --}}
                     <div class="space-y-2">
                         <label class="block text-sm font-semibold text-slate-700">
                             Pilih Rasa <span class="text-red-500">* Minimal pilih satu</span>
                         </label>

                         <div class="grid grid-cols-4 gap-3">
                             @foreach ($rasalist as $item)
                                 <label
                                     class="flex items-center gap-2 p-2 border rounded-lg cursor-pointer hover:bg-blue-400">
                                     <input type="checkbox" name="rasa[]" value="{{ $item->KD_RASA }}"
                                         class="rounded text-primary focus:ring-primary">
                                     <span class="text-sm text-slate-700 font-semibold">
                                         {{ $item->nama_rasa }}
                                     </span>
                                 </label>
                             @endforeach
                         </div>
                     </div>
                     {{-- Topping kue  --}}
                     <div class="space-y-2">
                         <label class="block text-sm font-semibold text-slate-700">
                             Pilih Rasa <span class="text-red-500">* Minimal pilih satu</span>
                         </label>

                         <div class="grid grid-cols-4 gap-3">
                             @foreach ($toppinglist as $item)
                                 <label
                                     class="flex items-center  gap-2 p-2 border rounded-lg cursor-pointer hover:bg-blue-400">
                                     <input type="checkbox" name="topping[]" value="{{ $item->KD_TOPPING }}"
                                         data-harga="{{ $item->biaya_tambahan }}" data-label="{{ $item->nama_topping }}"
                                         class="topping-checkbox">
                                     <span class="text-sm font-semibold">
                                         {{ $item->nama_topping }} <br> ( +Rp
                                         {{ number_format($item->biaya_tambahan) }})
                                     </span>
                                 </label>
                             @endforeach

                         </div>
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
         <div class="price border p-4 h-[480px] bg-white rounded-xl w-[200px]">
             <h2 class="font-bold mb-3">Biaya Tambahan</h2>
             <ul id="topping-list" class="text-sm space-y-1"></ul>
             <hr class="my-3">
             <div class="font-bold text-lg">
                 Total Topping: Rp <span id="total-topping">0</span>
             </div>
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
         {{-- Error atau sukses Notif ketika berhasil atau gagal --}}
         @if (session('success'))
             <div id="alert" class="bg-green-100 text-green-700 p-3 rounded mb-4">
                 {{ session('success') }}
             </div>
         @endif

         @if (session('error'))
             <div id="alert" class="bg-red-100 text-red-700 p-3 rounded mb-4">
                 {{ session('error') }}
             </div>
         @endif

         @if ($errors->any())
             <div id="alert" class="bg-red-100 text-red-700 p-3 rounded mb-4">
                 <ul class="list-disc list-inside">
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         <!-- Table -->
         <div class="overflow-x-auto mt-12">
             <table class="w-full border-collapse">
                 <thead>
                     <tr class="bg-slate-50 text-left text-sm text-slate-600">
                         <th class="px-4 py-3 font-semibold">Nama Kue</th>
                         <th class="px-4 py-3 font-semibold">Ukuran Kue</th>
                         <th class="px-4 py-3 font-semibold">Rasa Kue</th>
                         <th class="px-4 py-3 font-semibold">Pilihan Topping</th>
                         <th class="px-4 py-3 font-semibold">Harga Pertopping</th>
                         <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                     </tr>
                 </thead>
                 <tbody class="divide-y">
                     @forelse($condiments as $condiment)
                         <tr class="hover:bg-slate-50 transition">
                             <td class="px-4 py-3 font-medium text-slate-800">
                                 {{ $condiment->kue->nama_kue }}
                             </td>
                             <td class="px-4 py-3 font-medium text-slate-800">
                                 {{ $condiment->ukuran_kue }}
                             </td>
                             <td class="px-4 py-3 font-medium text-slate-800">
                                 @forelse ($condiment->rasa as $rasa)
                                     <div class="flex justify-between text-sm">
                                         <span>{{ $rasa->nama_rasa }}</span>
                                     </div>
                                 @empty
                                     <span class="text-slate-400 italic">Tanpa topping</span>
                                 @endforelse
                             </td>
                             <td class="px-4 py-3 font-medium text-slate-800">
                                 @forelse ($condiment->topping as $topping)
                                     <div class="flex justify-between text-sm">
                                         <span>{{ $topping->nama_topping }}</span>
                                     </div>
                                 @empty
                                     <span class="text-slate-400 italic">Tanpa topping</span>
                                 @endforelse
                             </td>
                             <td>
                                 @forelse ($condiment->topping as $topping)
                                     <div class="flex">
                                         <span class="text-slate-500">
                                             +{{ number_format($topping->biaya_tambahan) }}
                                         </span>
                                     </div>
                                 @empty
                                 @endforelse
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

     {{-- Modal Add Rasa dan Toping --}}
     <div id="modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
         <div class="bg-white w-full max-w-md rounded-lg p-6">
             <h2 id="modalTitle" class="text-lg font-semibold mb-4"></h2>
             <form method="post" action={{ route('admin.post.condiment') }}>
                 @csrf
                 <input type="hidden" name="type" id="typeInput">

                 <!-- Nama -->
                 <label class="block text-sm font-medium">Nama</label>
                 <input type="text" name="nama" class="w-full border rounded px-3 py-2 mt-1 mb-4" required>

                 <!-- Harga (khusus topping) -->
                 <div id="hargaWrapper" class="hidden">
                     <label class="block text-sm font-medium">Harga</label>
                     <input type="number" name="harga" class="w-full border rounded px-3 py-2 mt-1 mb-4">
                 </div>

                 <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded">
                     Simpan
                 </button>
             </form>

             <button onclick="closeModal()" class="mt-4 text-md font-bold text-red-500 w-full">
                 Tutup
             </button>
         </div>
     </div>


 </main>
 @push('scripts')
     <script>
         // Notif ketika berhasil untuk menambah jenis kue
         setTimeout(() => {
             const alert = document.getElementById('alert')
             if (alert) {
                 alert.remove()
             }
         }, 5000)

         //fn modal buat buka tambah Topping atau rasa berdasarkan type

         function openModal(type) {
             const modal = document.getElementById('modal')
             const title = document.getElementById('modalTitle')
             const typeInput = document.getElementById('typeInput')
             const hargaWrapper = document.getElementById('hargaWrapper')

             if (type === 'topping') {
                 title.innerText = 'Tambah Topping'
                 typeInput.value = 'topping'
                 hargaWrapper.classList.remove('hidden')
             } else {
                 title.innerText = 'Tambah Rasa'
                 typeInput.value = 'rasa'
                 hargaWrapper.classList.add('hidden')
             }

             modal.classList.remove('hidden')
             modal.classList.add('flex')
         }

         function closeModal() {
             const modal = document.getElementById('modal')
             modal.classList.add('hidden')
             modal.classList.remove('flex')
         }

         // Preview List Harga Topping
         const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
         const totalEl = document.getElementById('total-topping');
         const listEl = document.getElementById('topping-list');

         function updateToppingTotal() {
             let total = 0;
             listEl.innerHTML = '';

             toppingCheckboxes.forEach(cb => {
                 if (cb.checked) {
                     const harga = parseInt(cb.dataset.harga);
                     const label = cb.dataset.label;

                     total += harga;

                     const li = document.createElement('li');
                     li.textContent = `+ ${label} : Rp ${harga.toLocaleString()}`;
                     listEl.appendChild(li);
                 }
             });

             totalEl.textContent = total.toLocaleString();
         }

         toppingCheckboxes.forEach(cb => {
             cb.addEventListener('change', updateToppingTotal);
         });
     </script>
 @endpush
