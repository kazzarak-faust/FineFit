<footer class="bg-brown-200 dark:bg-gray-900 mt-16 border-t border-brown-300 py-10">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-5 gap-8">

        {{-- Kolom 1: Tagline & Kontak --}}
        <div class="col-span-2">
            <h3 class="text-xl font-extrabold text-brown-800 mb-3">FineFit</h3>
            <p class="text-sm text-brown-700 mb-4">
                Pick model, fabric, color, and details.
            </p>
            <p class="text-sm text-gray-700">
                Customize: <a href="mailto:hi@finefit.co" class="hover:underline text-brown-700">hi@finefit.co</a>
            </p>
            <p class="text-sm text-gray-700">
                Phone: 62 773894057
            </p>
        </div>

        {{-- Kolom 2: Company --}}
        <div>
            <h4 class="font-semibold text-brown-800 mb-3">Company</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">About</a></li>
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Careers</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Support --}}
        <div>
            <h4 class="font-semibold text-brown-800 mb-3">Support</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Help Center</a></li>
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Shipping</a></li>
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Returns</a></li>
            </ul>
        </div>
        
        {{-- Kolom 4: Kustomisasi (Pengulangan Kontak, Opsional) --}}
        <div>
            <h4 class="font-semibold text-brown-800 mb-3">Follow Us</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Instagram</a></li>
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">Facebook</a></li>
                <li><a href="#" class="text-gray-700 hover:text-brown-700 transition">LinkedIn</a></li>
            </ul>
        </div>

    </div>

    <div class="mt-10 pt-6 border-t border-brown-300 text-center">
        <p class="text-xs text-gray-600">&copy; {{ date('Y') }} FineFit. All rights reserved.</p>
    </div>
</div>


</footer>