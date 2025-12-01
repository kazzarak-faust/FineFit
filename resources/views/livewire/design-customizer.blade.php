<div class="p-4" wire:poll.10s>
    {{-- Notifikasi Sukses/Error (dari method addToCart) --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-md" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session()->has('error') || session()->has('info'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4 shadow-md" role="alert">
            <span class="block sm:inline">{{ session('error') ?? session('info') }}</span>
        </div>
    @endif

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Design Customization</h1>

    <div class="grid grid-cols-3 gap-8">
        
        {{-- ============================================= --}}
        {{-- KOLOM KIRI: OPSI KUSTOMISASI --}}
        {{-- ============================================= --}}
        <div class="col-span-2 space-y-8 p-6 bg-white rounded-lg shadow-xl">

            {{-- 1. MODEL TYPE (T-Shirt, Hoodie, Dress) --}}
            @if (isset($productTypes) && $productTypes->isNotEmpty()) {{-- <--- PERBAIKAN DI SINI --}}
            <div>
                <h3 class="text-xl font-semibold mb-3 border-b pb-2 text-brown-700">Tipe Model</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach ($productTypes as $productType)
                        <button 
                            wire:click="$set('selectedProductTypeId', {{ $productType->id }})"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-colors border-2 shadow-sm
                                @if ($selectedProductTypeId == $productType->id) 
                                    bg-brown-700 text-white border-brown-700 font-bold 
                                @else 
                                    bg-gray-100 text-gray-700 hover:bg-gray-200 border-gray-300
                                @endif"
                        >
                            {{ $productType->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            @else
                <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700">
                    <p class="font-bold">Perhatian!</p>
                    <p>Tidak ada Tipe Produk yang dimuat. Pastikan Anda sudah menjalankan Seeder data dasar.</p>
                </div>
            @endif

            {{-- 2. FABRIC / MATERIAL --}}
            @if (isset($materials) && $materials->isNotEmpty()) {{-- <--- PERBAIKAN DI SINI --}}
            <div>
                <h3 class="text-xl font-semibold mb-3 border-b pb-2 text-brown-700">Material Kain</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach ($materials as $material)
                        <button 
                            wire:click="$set('selectedMaterialId', {{ $material->id }})"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-colors border-2 shadow-sm
                                @if ($selectedMaterialId == $material->id) 
                                    border-brown-700 bg-brown-50 font-bold ring-2 ring-brown-300
                                @else 
                                    border-gray-200 bg-white hover:border-gray-400
                                @endif"
                        >
                            {{ $material->name }} (Rp{{ number_format($material->price_per_unit) }})
                        </button>
                    @endforeach
                </div>
            </div>
            @else
                 <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700">
                    <p class="font-bold">Perhatian!</p>
                    <p>Tidak ada Data Material yang dimuat. Pastikan Anda sudah menjalankan Seeder data dasar.</p>
                </div>
            @endif

            {{-- 3. OPSI DINAMIS (COLORS, SIZE, POCKET, EMBROIDERI) --}}
            @foreach ($designOptions as $category => $options)
                @if($options->isNotEmpty())
                    <div wire:key="{{ $category }}-options-{{ $selectedProductTypeId }}">
                        <h3 class="text-xl font-semibold mb-3 border-b pb-2 text-brown-700">{{ $category }}</h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($options as $option)
                                
                                @php
                                    // Tentukan apakah opsi ini dipilih
                                    $isSelected = isset($selectedOptions[$category]) && $selectedOptions[$category] == $option->id;
                                    
                                    // Hitung dan format penyesuaian harga
                                    $priceText = '';
                                    if ($option->price_adjustment > 0) {
                                        $priceText = ' (+Rp' . number_format($option->price_adjustment, 0, ',', '.') . ')';
                                    } elseif ($option->price_adjustment < 0) {
                                        $priceText = ' (-Rp' . number_format(abs($option->price_adjustment), 0, ',', '.') . ')';
                                    }
                                @endphp
                                
                                {{-- LOGIKA KHUSUS UNTUK COLOR (Swatches) --}}
                                @if ($category == 'Color')
                                    <button
                                        wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                        style="background-color: {{ $option->value }}"
                                        title="{{ $option->label }} {{ $priceText }}"
                                        class="w-8 h-8 rounded-full border-2 transition-all shadow-sm
                                            @if ($isSelected)
                                                border-brown-700 ring-2 ring-offset-2 ring-brown-500
                                            @else
                                                border-gray-400 hover:ring-1 hover:ring-brown-300
                                            @endif"
                                    ></button>
                                @else
                                    {{-- LOGIKA UNTUK SIZE DAN CUSTOM OPTION (Buttons) --}}
                                    <button 
                                        wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                        class="px-4 py-2 rounded-lg text-sm font-medium transition-colors border-2 shadow-sm
                                            @if ($isSelected) 
                                                bg-brown-700 text-white border-brown-700 font-bold
                                            @else 
                                                bg-gray-100 text-gray-700 hover:bg-gray-200 border-gray-300
                                            @endif"
                                    >
                                        {{ $option->label }} {{ $priceText }}
                                    </button>
                                @endif
                                
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            {{-- ACTION BUTTONS --}}
            <div class="pt-6 border-t mt-8 space-x-4">
                <button 
                    wire:click="resetOptions" {{-- Hubungkan ke method resetOptions() di Livewire --}}
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors shadow-lg"
                >
                    Reset
                </button>
                <button 
                    wire:click="addToCart" 
                    class="bg-brown-700 hover:bg-brown-800 text-white font-semibold py-3 px-6 rounded-lg shadow-xl transition-colors"
                >
                    <i class="fa-solid fa-cart-plus mr-2"></i> Tambahkan ke Keranjang
                </button>
            </div>

        </div>

        {{-- ============================================= --}}
        {{-- KOLOM KANAN: PREVIEW & HARGA --}}
        {{-- ============================================= --}}
        <div class="col-span-1 space-y-6">
            {{-- 1. MOCKUP PREVIEW --}}
            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                @php
                    // Ambil detail produk yang sedang dipilih (aman dengan firstWhere)
                    // Tambahkan pengecekan isset()
                    $currentProduct = isset($productTypes) ? $productTypes->firstWhere('id', $selectedProductTypeId) : null;
                @endphp
                
                <h3 class="text-xl font-bold mb-4">{{ $currentProduct?->name ?? 'Pilih Model' }}</h3>

                <img 
                    src="{{ $currentProduct?->default_image_url ?? '/images/placeholder.png' }}" 
                    alt="Product Preview" 
                    class="w-full h-auto object-contain"
                    onerror="this.onerror=null;this.src='/images/placeholder.png';"
                >
                <p class="text-sm text-gray-500 mt-2">Pratinjau 3D akan dimuat di sini.</p>
            </div>

            {{-- 2. RINGKASAN HARGA --}}
            <div class="bg-cream-200 p-6 rounded-lg shadow-xl border border-brown-300">
                <h3 class="text-xl font-bold mb-3 text-brown-800">Harga Desain</h3>
                <p class="text-gray-600">Total Harga Kustomisasi:</p>
                <p class="text-4xl font-extrabold text-brown-700">
                    Rp{{ number_format($finalPrice, 0, ',', '.') }}
                </p>
                {{-- Tambahan status update --}}
                <p class="text-sm text-gray-500 mt-2">
                    <span wire:loading.delay.longest class="text-blue-500">
                        <i class="fa-solid fa-sync fa-spin mr-1"></i> Menghitung ulang harga...
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>