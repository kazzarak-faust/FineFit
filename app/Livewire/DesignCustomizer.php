<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductType;
use App\Models\Material;
use App\Models\DesignOption;
use App\Models\DesignConfiguration; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log; 

class DesignCustomizer extends Component
{
    // Menggunakan type hint Collection
    public Collection $productTypes;
    public Collection $materials;
    public Collection $designOptions;
    
    public $selectedProductTypeId = 0; // Inisialisasi dengan 0
    public $selectedMaterialId = 0;    // Inisialisasi dengan 0
    public $selectedOptions = []; 
    public $finalPrice = 0;
    
    public function mount()
    {
        // 1. Inisialisasi properti sebagai Collection kosong untuk mencegah crash
        $this->productTypes = collect();
        $this->materials = collect();
        $this->designOptions = collect();
        
        // --- LOGIC BYPASS DATABASE ---
        
        // Coba ambil data dari Database
        $dbProductTypes = ProductType::all();
        $dbMaterials = Material::all();

        // Fallback jika database kosong
        if ($dbProductTypes->isEmpty() || $dbMaterials->isEmpty()) {
            Log::warning("FineFit: Database kosong. Menggunakan data statis.");
            
            // Isi properti dengan data statis (Hanya untuk debugging dan demo)
            $this->productTypes = collect([
                (object)['id' => 1, 'name' => 'T-Shirt', 'base_price' => 75000, 'default_image_url' => '/images/mockup-tshirt.png'],
                (object)['id' => 2, 'name' => 'Jacket', 'base_price' => 250000, 'default_image_url' => '/images/mockup-jacket.png'],
            ]);

            $this->materials = collect([
                (object)['id' => 1, 'name' => 'Cotton', 'price_per_unit' => 45000],
                (object)['id' => 2, 'name' => 'Linen', 'price_per_unit' => 65000],
                (object)['id' => 3, 'name' => 'Denim', 'price_per_unit' => 80000],
            ]);
            
            // Opsi Desain Statis (Minimal)
            $this->designOptions = collect([
                'Size' => collect([(object)['id' => 101, 'label' => 'Normal', 'value' => 'normal', 'price_adjustment' => 0]]),
                'Color' => collect([(object)['id' => 201, 'label' => 'White', 'value' => '#FFFFFF', 'price_adjustment' => 0]]),
            ]);
        } else {
            // Gunakan data Database
            $this->productTypes = $dbProductTypes;
            $this->materials = $dbMaterials;
        }

        // 2. Set Pilihan Awal (Default ke ID 1)
        if ($this->productTypes->isNotEmpty()) {
            $this->selectedProductTypeId = $this->productTypes->first()->id;
        }
        if ($this->materials->isNotEmpty()) {
            $this->selectedMaterialId = $this->materials->first()->id;
        }
        
        // 3. Hitung harga awal
        if ($this->selectedProductTypeId && $this->selectedMaterialId) {
            $this->calculatePrice();
        }
    }
    
    public function loadOptions()
    {
        // Karena kita sudah memuat semua opsi di mount (baik dari DB atau statis), 
        // kita tidak perlu memuat ulang di sini
    }
    
    public function calculatePrice()
    {
        // Cari data di koleksi (baik statis maupun DB)
        $product = $this->productTypes->firstWhere('id', $this->selectedProductTypeId);
        $material = $this->materials->firstWhere('id', $this->selectedMaterialId);
        
        if (!$product || !$material) return;
        
        $basePrice = $product->base_price + $material->price_per_unit; 
        
        $adjustment = 0;
        // Hitung adjustment manual dari koleksi designOptions
        $flatOptions = $this->designOptions->flatten();
        foreach ($this->selectedOptions as $selectedId) {
             $opt = $flatOptions->firstWhere('id', $selectedId);
             if ($opt) $adjustment += $opt->price_adjustment;
        }

        $this->finalPrice = $basePrice + $adjustment;
    }
    
    public function updated($propertyName)
    {
        $this->calculatePrice();
    }

    public function resetOptions()
    {
        $this->selectedOptions = []; 
        $this->selectedProductTypeId = $this->productTypes->first()->id ?? null;
        $this->selectedMaterialId = $this->materials->first()->id ?? null;
        $this->calculatePrice();
        session()->flash('info', 'Opsi desain telah diatur ulang.');
    }

    public function addToCart()
    {
        if (!Auth::check()) {
             session()->flash('error', 'Anda harus login untuk menambahkan item ke keranjang.');
             return redirect()->route('login');
        }
        
        // Cek jika mode statis
        $firstProduct = $this->productTypes->first();
        if (!($firstProduct instanceof ProductType)) {
             session()->flash('error', 'Mode Demo: Tidak dapat menyimpan ke database.');
             return redirect()->route('checkout.index');
        }


        if (!$this->selectedProductTypeId || !$this->selectedMaterialId) {
            session()->flash('error', 'Silakan lengkapi pilihan desain Anda.');
            return;
        }
        
        try {
            DesignConfiguration::create([
                'user_id' => Auth::id(),
                'product_type_id' => $this->selectedProductTypeId,
                'material_id' => $this->selectedMaterialId,
                'selected_options' => $this->selectedOptions, 
                'final_price' => $this->finalPrice,
                'status' => 'In Cart',
            ]);

            return redirect()->route('checkout.index')->with('success', 'Desain berhasil ditambahkan ke keranjang!');
            
        } catch (\Exception $e) {
            Log::error("Gagal menyimpan desain: " . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat menyimpan. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('livewire.design-customizer');
    }
}