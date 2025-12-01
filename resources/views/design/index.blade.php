<!-- <div class="min-h-screen p-8 bg-[#f3eee9]" wire:poll.10s>

    {{-- NOTIFIKASI --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-md">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error') || session()->has('info'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4 shadow-md">
            {{ session('error') ?? session('info') }}
        </div>
    @endif

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Design Customization</h1>

    <div class="grid grid-cols-3 gap-8">

        {{-- ====================================== --}}
        {{-- KIRI: CUSTOMIZATION PANEL --}}
        {{-- ====================================== --}}
        <div class="col-span-2 bg-white p-8 rounded-xl shadow">

            {{-- MODEL TYPE --}}
            @if ($productTypes->isNotEmpty())
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-3 text-brown-700">Model Type</h3>

                <div class="flex flex-wrap gap-3">
                    @foreach ($productTypes as $productType)
                        <button 
                            wire:click="$set('selectedProductTypeId', {{ $productType->id }})"
                            class="px-4 py-2 rounded-full text-sm font-medium border transition-all
                                @if ($selectedProductTypeId == $productType->id)
                                    bg-[#8e5b3a] text-white border-[#8e5b3a]
                                @else
                                    bg-[#e8d8c8] text-gray-800 hover:bg-[#d2c1b3] border-gray-300
                                @endif"
                        >
                            {{ $productType->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            @endif


            {{-- MATERIAL --}}
            @if ($materials->isNotEmpty())
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-3 text-brown-700">Fabric</h3>

                <div class="flex flex-wrap gap-3">
                    @foreach ($materials as $material)
                        <button 
                            wire:click="$set('selectedMaterialId', {{ $material->id }})"
                            class="px-4 py-2 rounded-full text-sm font-medium border transition-all
                                @if ($selectedMaterialId == $material->id)
                                    bg-[#8e5b3a]/10 text-[#8e5b3a] border-[#8e5b3a] font-semibold ring-2 ring-[#8e5b3a]/40
                                @else
                                    bg-white border-gray-300 hover:border-gray-500 text-gray-700
                                @endif"
                        >
                            {{ $material->name }} (Rp{{ number_format($material->price_per_unit) }})
                        </button>
                    @endforeach
                </div>
            </div>
            @endif


            {{-- OPTIONS DINAMIS --}}
            @foreach ($designOptions as $category => $options)
                @if ($options->isNotEmpty())
                <div class="mb-8" wire:key="{{ $category }}-options-{{ $selectedProductTypeId }}">
                    <h3 class="text-xl font-semibold mb-3 text-brown-700">{{ $category }}</h3>

                    <div class="flex flex-wrap gap-3">
                        @foreach ($options as $option)

                        @php
                            $isSelected = isset($selectedOptions[$category]) && $selectedOptions[$category] == $option->id;
                            $priceText = $option->price_adjustment == 0
                                ? ''
                                : ($option->price_adjustment > 0
                                    ? ' (+Rp'.number_format($option->price_adjustment).')'
                                    : ' (-Rp'.number_format(abs($option->price_adjustment)).')');
                        @endphp

                        {{-- COLOR --}}
                        @if ($category == 'Color')
                            <button 
                                wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                style="background-color: {{ $option->value }}"
                                class="w-9 h-9 rounded-full border-2 shadow-sm transition-all
                                    @if ($isSelected)
                                        border-[#8e5b3a] ring-2 ring-[#8e5b3a]/40
                                    @else
                                        border-gray-300 hover:ring-1 hover:ring-[#8e5b3a]/40
                                    @endif"
                                title="{{ $option->label }} {{ $priceText }}"
                            ></button>

                        {{-- BUTTON OPTIONS --}}
                        @else
                            <button 
                                wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                class="px-4 py-2 rounded-full text-sm border transition-all
                                    @if ($isSelected)
                                        bg-[#8e5b3a] text-white border-[#8e5b3a]
                                    @else
                                        bg-[#e8d8c8] text-gray-800 hover:bg-[#d2c1b3] border-gray-300
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


            {{-- BUTTONS --}}
            <div class="mt-12 flex gap-4">
                <button 
                    wire:click="resetOptions"
                    class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg"
                >
                    Reset
                </button>

                <button 
                    wire:click="addToCart"
                    class="px-6 py-3 bg-[#8e5b3a] hover:bg-[#744a30] text-white font-semibold rounded-lg"
                >
                    Tambahkan ke Keranjang
                </button>
            </div>

        </div>


        {{-- ====================================== --}}
        {{-- KANAN: PREVIEW & HARGA --}}
        {{-- ====================================== --}}
        <div class="col-span-1 space-y-6">

            {{-- PREVIEW --}}
            <div class="bg-white p-6 rounded-xl shadow text-center">
                @php $currentProduct = $productTypes->firstWhere('id', $selectedProductTypeId); @endphp
                
                <h3 class="text-xl font-bold mb-4">{{ $currentProduct->name ?? 'Pilih Model' }}</h3>

                <img 
                    src="{{ $currentProduct->default_image_url ?? '/images/placeholder.png' }}"
                    class="w-full object-contain"
                    onerror="this.onerror=null;this.src='/images/placeholder.png';"
                >
                <p class="text-sm text-gray-500 mt-2">Pratinjau 3D akan ditampilkan di sini.</p>
            </div>

            {{-- PRICING --}}
            <div class="bg-[#e6d4c6] p-6 rounded-xl shadow border">
                <h3 class="text-xl font-bold text-[#8e5b3a] mb-2">Total Harga</h3>
                <p class="text-4xl font-extrabold text-[#8e5b3a]">
                    Rp{{ number_format($finalPrice, 0, ',', '.') }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    <span wire:loading.delay.longest class="text-blue-600">
                        Menghitung ulang harga...
                    </span>
                </p>
            </div>
        </div>

    </div>
</div> -->
