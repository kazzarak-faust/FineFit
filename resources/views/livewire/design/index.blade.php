{{-- resources/views/livewire/design/index.blade.php --}}

<div class="min-h-screen p-6 md:p-8 bg-[#f3eee9]" wire:poll.10s>

    {{-- NOTIFIKASI --}}
    @if (session()->has('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 px-5 py-4 rounded-lg relative mb-6 shadow-sm animate-in fade-in slide-in-from-top-2 duration-300">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session()->has('error') || session()->has('info'))
        <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-800 px-5 py-4 rounded-lg relative mb-6 shadow-sm animate-in fade-in slide-in-from-top-2 duration-300">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">{{ session('error') ?? session('info') }}</span>
            </div>
        </div>
    @endif

    {{-- TITLE --}}
    <h1 class="text-3xl md:text-4xl font-bold mb-8 text-gray-800 tracking-tight">Design Customization</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">

        {{-- ====================================== --}}
        {{-- KIRI: CUSTOMIZATION PANEL --}}
        {{-- ====================================== --}}
        <div class="lg:col-span-2 bg-white p-6 md:p-8 rounded-2xl shadow-lg border border-gray-100">

            {{-- MODEL TYPE --}}
            @if ($productTypes->isNotEmpty())
            <div class="mb-10">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Model Type</h3>

                <div class="flex flex-wrap gap-3">
                    @foreach ($productTypes as $productType)
                        <button 
                            wire:click="$set('selectedProductTypeId', {{ $productType->id }})"
                            class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-200 transform hover:scale-105 active:scale-95
                                @if ($selectedProductTypeId == $productType->id)
                                    bg-[#d4a574] text-white shadow-md
                                @else
                                    bg-[#e8d8c8] text-gray-700 hover:bg-[#dcc9b5]
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
            <div class="mb-10">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Fabric</h3>

                <div class="flex flex-wrap gap-3">
                    @foreach ($materials as $material)
                        <button 
                            wire:click="$set('selectedMaterialId', {{ $material->id }})"
                            class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-200 transform hover:scale-105 active:scale-95
                                @if ($selectedMaterialId == $material->id)
                                    bg-[#d4a574] text-white shadow-md
                                @else
                                    bg-[#e8d8c8] text-gray-700 hover:bg-[#dcc9b5]
                                @endif"
                        >
                            {{ $material->name }}
                            <span class="text-xs opacity-90">(Rp{{ number_format($material->price_per_unit) }})</span>
                        </button>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- OPTIONS DINAMIS --}}
            @foreach ($designOptions as $category => $options)
                @if ($options->isNotEmpty())
                <div class="mb-10" wire:key="{{ $category }}-options-{{ $selectedProductTypeId }}">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">{{ $category }}</h3>

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

                        {{-- COLOR TYPE --}}
                        @if ($category == 'Color')
                            <button 
                                wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                style="background-color: {{ $option->value }}"
                                class="w-10 h-10 rounded-full border-3 shadow-md transition-all duration-200 transform hover:scale-110 active:scale-95
                                    @if ($isSelected)
                                        ring-4 ring-[#d4a574] ring-offset-2 border-white
                                    @else
                                        border-gray-300 hover:border-gray-400
                                    @endif"
                                title="{{ $option->label }} {{ $priceText }}"
                            ></button>
                        
                        {{-- PATTERN TYPE (if it's a pattern, show as a box) --}}
                        @elseif ($category == 'Pattern')
                            <button 
                                wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                class="w-20 h-20 rounded-lg border-2 transition-all duration-200 transform hover:scale-105 active:scale-95 bg-gray-200 hover:bg-gray-300
                                    @if ($isSelected)
                                        ring-4 ring-[#d4a574] ring-offset-2 border-[#d4a574]
                                    @else
                                        border-gray-300
                                    @endif"
                                title="{{ $option->label }} {{ $priceText }}"
                            >
                                <span class="text-xs text-gray-600 font-medium">{{ $option->label }}</span>
                            </button>
                        @else
                            {{-- BUTTON OPTIONS --}}
                            <button 
                                wire:click="$set('selectedOptions.{{ $category }}', {{ $option->id }})"
                                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-200 transform hover:scale-105 active:scale-95
                                    @if ($isSelected)
                                        bg-[#d4a574] text-white shadow-md
                                    @else
                                        bg-[#e8d8c8] text-gray-700 hover:bg-[#dcc9b5]
                                    @endif"
                            >
                                {{ $option->label }}
                                @if ($priceText)
                                    <span class="text-xs opacity-90">{{ $priceText }}</span>
                                @endif
                            </button>
                        @endif

                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach

            {{-- BUTTONS --}}
            <div class="mt-12 flex flex-col sm:flex-row gap-4">
                <button 
                    wire:click="resetOptions"
                    class="flex-1 px-8 py-4 bg-[#742626] hover:bg-[#5a1e1e] text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-[1.02] active:scale-95 shadow-lg hover:shadow-xl"
                >
                    Reset
                </button>

                <button 
                    wire:click="addToCart"
                    class="flex-1 px-8 py-4 bg-[#8e5b3a] hover:bg-[#744a30] text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-[1.02] active:scale-95 shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Add to Cart
                </button>
            </div>

        </div>

        {{-- ====================================== --}}
        {{-- KANAN: PREVIEW & HARGA --}}
        {{-- ====================================== --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- PREVIEW --}}
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                @php $currentProduct = $productTypes->firstWhere('id', $selectedProductTypeId); @endphp
                
                <h3 class="text-xl font-bold mb-6 text-gray-800 text-center">
                    {{ $currentProduct->name ?? 'Pilih Model' }}
                </h3>

                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-8 mb-4">
                    <img 
                        src="{{ $currentProduct->default_image_url ?? '/images/placeholder.png' }}"
                        alt="{{ $currentProduct->name ?? 'Product Preview' }}"
                        class="w-full h-auto object-contain drop-shadow-2xl"
                        onerror="this.onerror=null;this.src='/images/placeholder.png';"
                    >
                </div>

                <p class="text-sm text-gray-500 text-center italic">Live preview of your design</p>
            </div>

            {{-- PRICING --}}
            <div class="bg-gradient-to-br from-[#e6d4c6] to-[#d4c2b4] p-6 rounded-2xl shadow-lg border border-[#c9b5a3]">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-bold text-[#6b4423]">Total Price</h3>
                    <svg class="w-6 h-6 text-[#8e5b3a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                
                <p class="text-4xl md:text-5xl font-extrabold text-[#8e5b3a] mb-2 tracking-tight">
                    Rp{{ number_format($finalPrice, 0, ',', '.') }}
                </p>

                <div class="min-h-[20px]">
                    <p wire:loading.delay.longest class="text-sm text-[#8e5b3a] font-medium animate-pulse flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Calculating...
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>