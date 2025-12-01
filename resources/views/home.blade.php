{{-- resources/views/home.blade.php --}}

@extends('layouts.app') 

@section('content')
    <div class="py-12">
        {{-- Kontainer Pusat: max-w-7xl mx-auto untuk memposisikan konten di tengah --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Wrapper untuk menampung konten utama, agar layoutnya rapi --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">

                {{-- ========================================================= --}}
                {{-- 1. BAGIAN BANNER/HERO --}}
                {{-- ========================================================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center mb-16">
                    <div>
                        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
                            Create Your Own Style with <span class="text-brown-700">FineFit.</span>
                        </h1>
                        <p class="text-gray-600 mb-6">
                            Personalized fashion powered by premium materials and 3D customization
                        </p>
                        
                        <div class="flex space-x-4 mb-8">
                            {{-- Tombol utama Start Designing --}}
                            <a href="{{ route('design.index') }}" class="bg-brown-700 hover:bg-brown-800 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-150">
                                Start Designing
                            </a>
                            {{-- Buttons fitur --}}
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-orange-100 text-orange-800 rounded-full">Creative Freedom</span>
                            <span class="inline-block px-3 py-1 text-sm font-semibold bg-teal-100 text-teal-800 rounded-full">3D Preview</span>
                        </div>
                    </div>
                    
                    {{-- Gambar di Sisi Kanan Banner --}}
                    <div>
                        <img src="images/fabric.jpg" alt="Fabric swatches" class="rounded-lg shadow-xl w-full h-80 object-cover">
                    </div>
                </div>

                {{-- ========================================================= --}}
                {{-- 2. BAGIAN HOW IT WORKS --}}
                {{-- ========================================================= --}}
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-6">How It Works</h2>
                    <div class="grid grid-cols-3 gap-8 text-center">
                        {{-- Step 1: Customize --}}
                        <div class="p-6 border rounded-lg shadow-sm">
                            <span class="text-4xl text-brown-700 mb-3 block">🛠️</span>
                            <h3 class="font-bold">Customize</h3>
                            <p class="text-sm text-gray-500">Pick model, fabric, color, and details.</p>
                        </div>
                        {{-- Step 2: Preview --}}
                        <div class="p-6 border rounded-lg shadow-sm">
                            <span class="text-4xl text-brown-700 mb-3 block">🖼️</span>
                            <h3 class="font-bold">Preview</h3>
                            <p class="text-sm text-gray-500">View your design in real time</p>
                        </div>
                        {{-- Step 3: Order --}}
                        <div class="p-6 border rounded-lg shadow-sm">
                            <span class="text-4xl text-brown-700 mb-3 block">🛍️</span>
                            <h3 class="font-bold">Order</h3>
                            <p class="text-sm text-gray-500">Place your order with seamless checkout</p>
                        </div>
                    </div>
                </div>

                {{-- ========================================================= --}}
                {{-- 3. BAGIAN FEATURED FABRICS (Menggunakan Data Dinamis Anda) --}}
                 <section class="mt-12 mb-16">
                    <h2 class="text-2xl font-bold mb-6">Featured Fabrics</h2>
                    <div class="grid grid-cols-3 gap-8">
                        
                        {{-- MATERIAL 1: COTTON (Cotton.webp) --}}
                        <div class="rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow">
                            <img src="/images/Cotton.webp" 
                                 alt="Cotton Fabric" 
                                 class="w-full h-56 object-cover"
                                 onerror="this.onerror=null;this.src='/images/placeholder.png';"> 
                            
                            <div class="p-4 bg-white">
                                <h3 class="text-lg font-bold text-gray-900">Cotton</h3>
                                <p class="text-gray-500 text-sm">Soft and breathable, perfect for daily wear.</p>
                                {{-- Link sementara ke halaman design (Tanpa ID material) --}}
                                <a href="{{ route('design.index') }}" 
                                   class="mt-2 inline-block text-sm text-brown-700 hover:text-brown-800 font-medium">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                        
                        {{-- MATERIAL 2: LINEN (Linen.webp) --}}
                        <div class="rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow">
                            <img src="/images/Linen.webp" 
                                 alt="Linen Fabric" 
                                 class="w-full h-56 object-cover"
                                 onerror="this.onerror=null;this.src='/images/placeholder.png';"> 
                            
                            <div class="p-4 bg-white">
                                <h3 class="text-lg font-bold text-gray-900">Linen</h3>
                                <p class="text-gray-500 text-sm">Airy and elegant drape, ideal for warm climates.</p>
                                <a href="{{ route('design.index') }}" 
                                   class="mt-2 inline-block text-sm text-brown-700 hover:text-brown-800 font-medium">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>
                        
                        {{-- MATERIAL 3: DENIM (Denim.jpg) --}}
                        <div class="rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow">
                            <img src="/images/Denim.jpg" 
                                 alt="Denim Fabric" 
                                 class="w-full h-56 object-cover"
                                 onerror="this.onerror=null;this.src='/images/placeholder.png';"> 
                            
                            <div class="p-4 bg-white">
                                <h3 class="text-lg font-bold text-gray-900">Denim</h3>
                                <p class="text-gray-500 text-sm">Durable and timeless, great for jackets and pants.</p>
                                <a href="{{ route('design.index') }}" 
                                   class="mt-2 inline-block text-sm text-brown-700 hover:text-brown-800 font-medium">
                                    View Details &rarr;
                                </a>
                            </div>
                        </div>

                    </div>
                </section>

                {{-- ========================================================= --}}
                {{-- 4. BAGIAN COMMUNITY REVIEWS (Menggunakan Data Dinamis Anda) --}}
                {{-- ========================================================= --}}
                <section class="mt-12">
                    <h2 class="text-2xl font-bold mb-6">What Our Community Says</h2>
                    <div class="grid grid-cols-3 gap-8">
                        @foreach ($communityReviews as $review)
                            <blockquote class="p-6 bg-gray-50 border-l-4 border-brown-700 rounded-r-lg shadow-sm">
                                <div class="flex items-center mb-4">
                                    {{-- Placeholder untuk Gambar Profil --}}
                                    <div class="w-10 h-10 bg-gray-300 rounded-full mr-3 flex items-center justify-center text-sm font-bold text-gray-600">
                                        {{ substr($review['name'], 0, 1) }}
                                    </div>
                                    <footer class="text-base font-semibold text-gray-900">{{ $review['name'] }}</footer>
                                </div>
                                <p class="italic text-gray-700 text-md">"{{ $review['quote'] }}"</p>
                            </blockquote>
                        @endforeach
                    </div>
                </section>
                
            </div>
        </div>
    </div>
@endsection