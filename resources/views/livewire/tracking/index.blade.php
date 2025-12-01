@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen flex justify-center items-start bg-gray-50 py-10">
    <div class="w-full max-w-5xl bg-white shadow rounded-2xl p-8">

        <h1 class="text-2xl font-semibold mb-2">Order Tracking</h1>
        <p class="text-gray-500 mb-6">Tracking information</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- LEFT SIDE --}}
            <div class="space-y-4">

                {{-- Ordered --}}
                <div class="flex justify-between items-start border rounded-xl p-4">
                    <div>
                        <p class="font-semibold">Ordered</p>
                        <p class="text-gray-500 text-sm">Your custom piece has been received</p>
                    </div>
                    <p class="text-gray-600 text-sm">Jan 10, 2025</p>
                </div>

                {{-- In Production --}}
                <div class="flex justify-between items-start border rounded-xl p-4">
                    <div>
                        <p class="font-semibold">In Production</p>
                        <p class="text-gray-500 text-sm">Cutting, stitching, and finishing</p>
                    </div>
                    <p class="text-gray-600 text-sm">Jan 12, 2025</p>
                </div>

                {{-- Shipped --}}
                <div class="flex justify-between items-start border rounded-xl p-4">
                    <div>
                        <p class="font-semibold">Shipped</p>
                        <p class="text-gray-500 text-sm">On the way to you</p>
                    </div>
                    <p class="text-gray-600 text-sm">Jan 15, 2025</p>
                </div>

                {{-- Delivered --}}
                <div class="flex justify-between items-start border rounded-xl p-4">
                    <div>
                        <p class="font-semibold">Delivered</p>
                        <p class="text-gray-500 text-sm">Estimated delivery date</p>
                    </div>
                    <p class="text-gray-600 text-sm">est. Jan 18, 2025</p>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="border rounded-xl p-6 space-y-4">
                <div>
                    <p class="text-gray-500 text-sm">Estimated Delivery</p>
                    <p class="font-semibold text-lg">Jan 18, 2025</p>
                </div>

                <hr>

                <div class="flex justify-between">
                    <p class="text-gray-500 text-sm">Destination</p>
                    <p class="font-semibold">Blater, Purbalingga</p>
                </div>

                <div class="flex justify-between">
                    <p class="text-gray-500 text-sm">Carrier</p>
                    <p class="font-semibold">JNT EXPRESS</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
