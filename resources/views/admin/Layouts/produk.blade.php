@extends('admin.main')

@section('sidebar')
    @include('admin.Components.sidebar')
@endsection
@section('content')
    <div class="flex gap-2 border-b mb-6">
        <button data-tab="produk"
            class="tab-btn flex items-center gap-2 px-4 py-2 rounded-t-lg text-primary border-b-2 border-primary font-semibold">
            <span class="material-symbols-outlined text-lg"><img src="/img/svg/cake.svg" class="max-w-[24px]"></span>
            Produk
        </button>
        <button data-tab="variasi_produk"
            class="tab-btn flex items-center gap-2 px-4 py-2 rounded-t-lg text-gray-500 hover:text-primary transition">
            <img src="/img/svg/komponenKue.svg" class="max-w-[24px]"></span>
            Variasi Produk
        </button>
        <button data-tab="condiment_produk"
            class="tab-btn flex items-center gap-2 px-4 py-2 rounded-t-lg text-gray-500 hover:text-primary transition">
            <img src="/img/svg/topping.svg" class="max-w-[24px]"></span>
            Condiment Produk
        </button>

    </div>

    <div id="produk" class="tab-content">
        @include('admin.Components.produk.produkcomponent')
    </div>
    <div id="variasi_produk" class="tab-content hidden">
        @include('admin.Components.produk.variasiprodukcomponent')
    </div>
    <div id="condiment_produk" class="tab-content hidden">
        @include('admin.components.produk.condimentproduk')
    </div>
@endsection

@push('scripts')
    <script>
        const buttons = document.querySelectorAll('.tab-btn')
        const contents = document.querySelectorAll('.tab-content')

        function activateTab(tabName) {
            // hide all content
            contents.forEach(c => c.classList.add('hidden'))
            document.getElementById(tabName)?.classList.remove('hidden')

            // reset all buttons
            buttons.forEach(b => {
                b.classList.remove(
                    'text-primary',
                    'border-b-2',
                    'border-primary',
                    'font-semibold'
                )
                b.classList.add('text-gray-500')
            })

            // activate current button
            const activeBtn = document.querySelector(`[data-tab="${tabName}"]`)
            if (activeBtn) {
                activeBtn.classList.remove('text-gray-500')
                activeBtn.classList.add(
                    'text-primary',
                    'border-b-2',
                    'border-primary',
                    'font-semibold'
                )
            }
        }

        // klik manual
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                activateTab(btn.dataset.tab)
            })
        })

        // ⬇️ AUTO ACTIVE TAB DARI SESSION
        document.addEventListener('DOMContentLoaded', () => {
            const activeTab = "{{ session('active_tab', 'produk') }}"
            activateTab(activeTab)
        })
    </script>
@endpush
