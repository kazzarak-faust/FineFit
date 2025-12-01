<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FineFit') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-cream-200">

    <div class="min-h-screen grid grid-cols-12">

        {{-- ========================================================= --}}
        {{-- SIDEBAR --}}
        {{-- ========================================================= --}}
        <aside class="col-span-3 lg:col-span-2 bg-cream-100 border-r border-gray-200 p-4 min-h-screen fixed lg:relative">

            {{-- Logo --}}
            <div class="flex items-center space-x-2 p-2 mb-6">
                <span class="text-2xl font-bold text-brown-700">FineFit</span>
            </div>

            {{-- Sidebar Navigation --}}
            @include('layouts.sidebar-navigation')

        </aside>

        {{-- ========================================================= --}}
        {{-- KONTEN UTAMA --}}
        {{-- ========================================================= --}}
        <div class="col-span-9 lg:col-span-10 flex flex-col ml-auto">

            {{-- HEADER --}}
            <header class="bg-white shadow-md p-4 flex items-center justify-between sticky top-0 z-10">

                {{-- Search Bar --}}
                <div class="relative w-1/3">
                    <input type="text"
                        placeholder="Search designs, fabrics..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-brown-700 focus:border-brown-700">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </path>
                </svg>
                </div>

                {{-- Right Buttons --}}
                <div class="flex space-x-3 items-center">
                    <a href="{{ route('design.index') }}"
                        class="flex items-center bg-brown-700 hover:bg-brown-800 text-white font-semibold py-2 px-4 rounded-lg transition duration-150">
                        <span class="mr-2">+</span> Start Designing
                    </a>

                    <a href="#"
                        class="flex items-center bg-brown-600 hover:bg-brown-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150">
                        <span class="mr-2">🛒</span> Chart
                    </a>

                    {{-- User Dropdown (default Breeze) --}}
                    @livewire('layout.navigation')
                </div>
            </header>

            {{-- PAGE CONTENT --}}
            <main class="flex-grow p-8">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            {{-- FOOTER --}}
            @include('layouts.footer')
        </div>

    </div>

    @livewireScripts
</body>
</html>
