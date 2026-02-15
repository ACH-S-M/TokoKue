@extends('pelanggan.Components.Menu')

@section('NavbarMenu')
    @include('pelanggan.Components.Navbar')
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center py-10">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white rounded-3xl shadow-2xl p-8 text-center">
            
            {{-- Success Icon --}}
            <div class="mb-6">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mb-2">
                Pesanan Berhasil Dibuat!
            </h1>
            
            <p class="text-gray-600 mb-6">
                Nomor Pesanan: <strong>{{ $pesanan->NO_PESANAN }}</strong>
            </p>

            <p class="text-gray-500 text-sm mb-8">
                Silakan lanjutkan pembayaran untuk menyelesaikan pesanan Anda
            </p>

            {{-- Payment Button --}}
            <button id="pay-button"
                class="w-full bg-blue-600 text-white py-4 rounded-2xl font-semibold text-lg hover:bg-blue-700 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 shadow-lg mb-4">
                Bayar Sekarang
            </button>

            <a href="{{ route('home') }}" 
                class="block text-gray-500 hover:text-gray-700 text-sm transition">
                Kembali ke Beranda
            </a>

        </div>

    </div>
</div>

{{-- Midtrans Snap Script --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location.href = "{{ route('home') }}";
            },
            onPending: function(result){
                alert("Menunggu pembayaran!");
                window.location.href = "{{ route('home') }}";
            },
            onError: function(result){
                alert("Pembayaran gagal!");
                console.log(result);
            },
            onClose: function(){
                alert('Anda menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    };
</script>
@endsection
