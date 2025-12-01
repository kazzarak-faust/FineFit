
<div class="p-6">
    <div class="bg-white rounded-3xl shadow-sm p-8">
        <h1 class="text-3xl font-semibold mb-8">Design Customization</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- LEFT PANEL --}}
            <div class="space-y-6">

                {{-- Model Type --}}
                <div>
                    <p class="font-semibold mb-2">Model Type</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach (['T-Shirt','Hoodie','Dress','Jacket'] as $item)
                            <button class="bg-rose-200 text-gray-700 px-4 py-2 rounded-full">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Fabric --}}
                <div>
                    <p class="font-semibold mb-2">Fabric</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach (['Cotton','Linen','Denim','Tweed'] as $item)
                            <button class="bg-rose-200 text-gray-700 px-4 py-2 rounded-full">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Colors --}}
                <div>
                    <p class="font-semibold mb-2">Colors</p>
                    <div class="flex gap-3">
                        @foreach (['#7F0000','#2F5D00','#0050D4','#35006D','#765548','#FF00C8','#00D8CD'] as $color)
                            <button class="w-8 h-8 rounded-full" style="background: {{ $color }}"></button>
                        @endforeach
                    </div>
                </div>

                {{-- Pattern --}}
                <div>
                    <p class="font-semibold mb-2">Pattern</p>
                    <div class="flex gap-3">
                        @foreach ([1,2,3] as $item)
                            <div class="w-20 h-14 bg-gray-300 rounded-lg"></div>
                        @endforeach
                    </div>
                </div>

                {{-- Size --}}
                <div>
                    <p class="font-semibold mb-2">Size</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach (['Normal','Oversize','Slim Fit'] as $item)
                            <button class="bg-rose-200 text-gray-700 px-4 py-2 rounded-full">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Custom Detail --}}
                <div>
                    <p class="font-semibold mb-2">Custom Details</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach (['Pocket Type','Embroideri','Others'] as $item)
                            <button class="bg-rose-200 text-gray-700 px-4 py-2 rounded-full">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- RIGHT PANEL / PREVIEW --}}
            <div class="flex justify-center items-start">
                <img src="{{ asset('img/mockup.png') }}" class="rounded-xl shadow-md w-full max-w-md">
            </div>

        </div>

        {{-- BUTTONS --}}
        <div class="mt-10 space-y-6">

            <button class="w-full bg-[#7B1C1C] text-white py-3 rounded-full">
                Reset
            </button>

            <button class="w-full bg-[#7A4A20] text-white py-3 rounded-full flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 6h15l-1.5 9h-13z" />
                </svg>
                Add to Chart
            </button>

        </div>

    </div>
</div>

