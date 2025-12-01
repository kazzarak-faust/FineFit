{{-- resources/views/layouts/sidebar-navigation.blade.php --}}

@php
    // Fungsi bantuan untuk menentukan link yang aktif
    $is_active = fn($route) => request()->routeIs($route) ? 'bg-brown-700 text-white' : 'text-gray-600 hover:bg-gray-200';
@endphp

<nav class="space-y-2">
    {{-- Link Home --}}
    <a href="{{ route('home') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('home') }}">
        <i class="fa-solid fa-house"></i> 
        <span>Home</span>
    </a>

    {{-- Link Design --}}
    <a href="{{ route('design.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('design.index') }}">
        <i class="fa-solid fa-pencil-ruler"></i>
        <span>Design</span>
    </a>
    
    {{-- Link Checkout --}}
    <a href="{{ route('checkout.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('checkout.index') }}">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Checkout</span>
    </a>

    {{-- BARU: Link Tracking --}}
    <a href="{{ route('tracking.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('tracking.index') }}">
        <i class="fa-solid fa-truck"></i>
        <span>Tracking</span>
    </a>
    
    {{-- Link History --}}
    <a href="{{ route('history.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('history.index') }}">
        <i class="fa-solid fa-history"></i>
        <span>History</span>
    </a>
    
    {{-- Link Profile --}}
    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-2 rounded-lg transition-colors {{ $is_active('profile.edit') }}">
        <i class="fa-solid fa-user"></i>
        <span>Profile</span>
    </a>
</nav>