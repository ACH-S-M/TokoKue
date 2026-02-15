@extends('admin.main')

@section('sidebar')
    @include('admin.Components.sidebar')
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight text-gray-800 font-bold">Daftar Pesanan Masuk</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No Pesanan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tanggal Pemesanan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Pelanggan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total Harga
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($detail_pesanan as $pesanan)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap font-medium">{{ $pesanan->NO_PESANAN }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $pesanan->tanggal_pesanan }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $pesanan->pelanggan->nama_pelanggan ?? 'Guest' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap font-bold text-green-600">
                                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-detail focus:outline-none focus:shadow-outline transform hover:scale-105 transition duration-150 ease-in-out"
                                            data-pesanan="{{ json_encode($pesanan) }}"
                                            data-details="{{ json_encode($pesanan->detail_pesanan) }}"
                                            data-pelanggan="{{ json_encode($pesanan->pelanggan) }}">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        Belum ada pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        {{ $detail_pesanan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Pesanan (Tailwind) -->
    <div id="detailModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 bg-black/30 transition-opacity" aria-hidden="true">

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start" id="printableArea">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 border-b pb-2" id="modal-title">
                                    Detail Pesanan <span id="modalNoPesanan" class="font-bold text-blue-600"></span>
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <h4 class="font-semibold text-gray-700 mb-2">Data Pemesan</h4>
                                        <div class="text-sm text-gray-600 space-y-1">
                                            <p><span class="font-medium">Nama:</span> <span id="modalNamaPelanggan"></span>
                                            </p>
                                            <p><span class="font-medium">Penerima:</span> <span
                                                    id="modalNamaPenerima"></span></p>
                                            <p><span class="font-medium">Alamat:</span> <span id="modalAlamat"></span></p>
                                            <p><span class="font-medium">Telepon:</span> <span id="modalTelepon"></span></p>
                                        </div>
                                    </div>
                                    <div class="text-left md:text-right">
                                        <h4 class="font-semibold text-gray-700 mb-2">Info Pesanan</h4>
                                        <div class="text-sm text-gray-600 space-y-1">
                                            <p><span class="font-medium">Tanggal:</span> <span id="modalTanggal"></span></p>
                                            <p><span class="font-medium">Status:</span> <span id="modalStatus"
                                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-blue-500 rounded"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="min-w-full border-collapse border border-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="border border-gray-200 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Produk</th>
                                                <th
                                                    class="border border-gray-200 px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Harga</th>
                                                <th
                                                    class="border border-gray-200 px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jml</th>
                                                <th
                                                    class="border border-gray-200 px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modalOrderDetails" class="bg-white divide-y divide-gray-200">
                                            <!-- Details injected via JS -->
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-gray-50 font-bold">
                                                <td colspan="3" class="border border-gray-200 px-4 py-2 text-right">Total
                                                </td>
                                                <td id="modalTotalHarga"
                                                    class="border border-gray-200 px-4 py-2 text-right text-blue-600"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="mt-4 p-4 bg-gray-50 rounded-md border border-gray-200">
                                    <span class="block text-sm font-medium text-gray-700">Catatan:</span>
                                    <p id="modalCatatan" class="text-sm text-gray-500 italic mt-1"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="printOrder()"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Cetak PDF
                        </button>
                        <button type="button" onclick="closeModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Handle Detail Button Click
            const detailButtons = document.querySelectorAll('.btn-detail');
            const modal = document.getElementById('detailModal');

            detailButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const pesanan = JSON.parse(this.dataset.pesanan);
                    const details = JSON.parse(this.dataset.details);
                    const pelanggan = JSON.parse(this.dataset.pelanggan) || {};

                    // Fill Basic Info
                    document.getElementById('modalNoPesanan').textContent = pesanan.NO_PESANAN;
                    document.getElementById('modalNamaPelanggan').textContent = pelanggan.nama_pelanggan ||
                        '-';
                    document.getElementById('modalNamaPenerima').textContent = pesanan
                    .nama_penerima;

                    const fullAddress =
                        `${pesanan.alamat_spesifik}, ${pesanan.kota}, ${pesanan.provinsi} ${pesanan.kode_pos}`;
                    document.getElementById('modalAlamat').textContent = fullAddress;
                    document.getElementById('modalTelepon').textContent = pelanggan.telepon_pelanggan || '-';
                    document.getElementById('modalTanggal').textContent = pesanan.tanggal_pesanan;
                    document.getElementById('modalStatus').textContent = pesanan.status;
                    document.getElementById('modalCatatan').textContent = pesanan.catatan ||
                        'Tidak ada catatan';
                    document.getElementById('modalTotalHarga').textContent = 'Rp ' + Number(pesanan
                        .total_harga).toLocaleString('id-ID');

                    // Fill Order Details Table
                    const tbody = document.getElementById('modalOrderDetails');
                    tbody.innerHTML = '';

                    details.forEach(item => {
                        let toppingsHtml = '';
                        console.log(item)
                        if (item.detail_topping && item.detail_topping.length > 0) {
                            toppingsHtml =
                                '<br><span class="text-xs text-gray-500 italic block mt-1">Topping: ' +
                                item.detail_topping.map(dt => dt.topping ? dt.topping
                                    .nama_topping : 'tidak menambah topping').join(', ') +
                                '</span>';
                        }

                        const subtotal = item.harga_saat_ini * item.jumlah_pesanan;

                        const row = `
                            <tr>
                                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">
                                    <span class="font-medium">${item.variasi_kue ? item.variasi_kue.kue.nama_kue : 'Produk Dihapus'}</span>
                                    ${toppingsHtml}
                                </td>
                                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 text-right">Rp ${Number(item.harga_saat_ini).toLocaleString('id-ID')}</td>
                                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 text-center">${item.jumlah_pesanan}</td>
                                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 text-right font-medium">Rp ${Number(subtotal).toLocaleString('id-ID')}</td>
                            </tr>
                        `;
                        tbody.insertAdjacentHTML('beforeend', row);
                    });

                    // Show Modal
                    modal.classList.remove('hidden');
                });
            });
        });

        function printOrder() {
            const printContent = document.getElementById('printableArea').innerHTML;
            const modalTitle = document.getElementById('modalNoPesanan').textContent;

            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Pesanan ' + modalTitle + '</title>');
            // Using a reliable Tailwind CDN for the print window to ensure styles render exactly as seen
            printWindow.document.write('<script src="https://cdn.tailwindcss.com"><\/script>');
            printWindow.document.write('</head><body class="bg-white p-8">');
            printWindow.document.write('<div class="max-w-3xl mx-auto border border-gray-200 p-6 rounded-lg">');
            printWindow.document.write('<h1 class="text-2xl font-bold mb-6 text-center border-b pb-4">Detail Pesanan ' +
                modalTitle + '</h1>');
            printWindow.document.write(printContent);
            printWindow.document.write('</div>');
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.focus();

            setTimeout(function() {
                printWindow.print();
                printWindow.close();
            }, 1000); // 1s delay to let CDN load
        }
    </script>
@endsection
