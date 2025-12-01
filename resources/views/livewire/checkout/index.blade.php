@extends('layouts.app')

@section('content')
<div class="p-6 flex justify-center">
    <div class="bg-white rounded-3xl shadow-sm p-10 w-full max-w-4xl">

        <h1 class="text-3xl font-semibold mb-10">Checkout</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- LEFT FORM SECTION --}}
            <div class="space-y-6">

                <p class="font-semibold">Shipping Information</p>

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Full Name" class="rounded-full border px-4 py-3">
                    <input type="text" placeholder="Phone Number" class="rounded-full border px-4 py-3">

                    <input type="text" placeholder="Address Line 1" class="rounded-full border px-4 py-3">
                    <input type="text" placeholder="Address Line 2" class="rounded-full border px-4 py-3">

                    <input type="text" placeholder="City" class="rounded-full border px-4 py-3">
                    <input type="text" placeholder="State" class="rounded-full border px-4 py-3">

                    <input type="text" placeholder="Postal Code" class="rounded-full border px-4 py-3">
                    <input type="text" placeholder="Country" class="rounded-full border px-4 py-3">
                </div>

                {{-- Payment Method --}}
                <div class="space-y-2">
                    <p class="font-semibold">Payment Method</p>
                    <div class="flex gap-3">
                        @foreach (['Credit Card','Bank Transfer','E-Wallet'] as $method)
                            <button class="bg-[#DAB79B] text-gray-700 px-5 py-2 rounded-full">
                                {{ $method }}
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- RIGHT SUMMARY --}}
            <div class="space-y-4">

                <div class="border rounded-2xl p-5 space-y-3">

                    {{-- Product --}}
                    <div class="flex justify-between">
                        <div>
                            <p class="font-semibold">Jacket</p>
                            <p class="text-sm text-gray-500">Linen - Oversize - Earth Brown</p>
                        </div>
                        <p class="font-semibold">Rp300.000</p>
                    </div>

                    <hr>

                    {{-- Subtotal --}}
                    <div class="flex justify-between text-gray-700">
                        <p>Subtotal</p>
                        <p>Rp300.000</p>
                    </div>

                    {{-- Shipping --}}
                    <div class="flex justify-between text-gray-700">
                        <p>Shipping</p>
                        <p>Rp50.000</p>
                    </div>

                    {{-- Tax --}}
                    <div class="flex justify-between text-gray-700">
                        <p>Tax</p>
                        <p>Rp30.000</p>
                    </div>

                    <hr>

                    {{-- Total --}}
                    <div class="flex justify-between font-semibold">
                        <p>Total</p>
                        <p>Rp380.000</p>
                    </div>

                </div>

            </div>

        </div>

        {{-- CONFIRM BUTTON --}}
        <div class="mt-12">
            <button class="w-full bg-[#7A4A20] text-white py-4 rounded-full text-lg">
                Confirm Order
            </button>
        </div>

    </div>
</div>
@endsection
