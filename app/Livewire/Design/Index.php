<?php

namespace App\Livewire\Design;

use Livewire\Component;
use App\Models\ProductType;
use App\Models\Material;
use App\Models\DesignOption;

class Index extends Component
{
    public $productTypes;
    public $materials;
    public $designOptions;

    public $selectedProductTypeId = null;
    public $selectedMaterialId = null;
    public $selectedOptions = []; // format: ['Color' => 3, 'Pattern' => 1]
    public $finalPrice = 0;

    public function mount()
    {
        // Ambil semua data dari database
        $this->productTypes = ProductType::all();
        $this->materials = Material::all();

        /**
         * Grouping design options berdasarkan kategori.
         * Hasil: Collection ber-key kategori seperti:
         * ['Color' => Collection, 'Pattern' => Collection]
         */
        $this->designOptions = DesignOption::all()->groupBy('category');

        // Set default pilihan produk
        if ($this->productTypes->isNotEmpty()) {
            $this->selectedProductTypeId = $this->productTypes->first()->id;
        }

        // Set default pilihan material
        if ($this->materials->isNotEmpty()) {
            $this->selectedMaterialId = $this->materials->first()->id;
        }

        $this->recalculatePrice();
    }

    /**
     * Hitung ulang harga berdasarkan:
     * - Base price product type
     * - Material price
     * - Semua design options yang dipilih (price_modifier)
     */
    public function recalculatePrice()
    {
        $base = 0;

        $product = $this->productTypes->firstWhere('id', $this->selectedProductTypeId);
        $material = $this->materials->firstWhere('id', $this->selectedMaterialId);

        if ($product) {
            $base += $product->base_price ?? 0;
        }

        if ($material) {
            $base += $material->price_per_unit ?? 0;
        }

        // Penyesuaian harga dari opsi desain
        $adjust = 0;
        foreach ($this->selectedOptions as $category => $optionId) {

            // Pastikan kategori benar-benar ada
            if (!isset($this->designOptions[$category])) {
                continue;
            }

            $option = $this->designOptions[$category]->firstWhere('id', $optionId);

            if ($option && isset($option->price_modifier)) {
                $adjust += $option->price_modifier;
            }
        }

        $this->finalPrice = max(0, $base + $adjust);
    }

    public function updatedSelectedProductTypeId()
    {
        $this->recalculatePrice();
    }

    public function updatedSelectedMaterialId()
    {
        $this->recalculatePrice();
    }

    public function updatedSelectedOptions()
    {
        $this->recalculatePrice();
    }

    /**
     * Reset semua pilihan kembali ke default
     */
    public function resetOptions()
    {
        $this->selectedOptions = [];

        $this->selectedProductTypeId = $this->productTypes->first()->id ?? null;
        $this->selectedMaterialId = $this->materials->first()->id ?? null;

        $this->recalculatePrice();

        session()->flash('success', 'Opsi dikembalikan ke default.');
    }

    /**
     * Tambahkan desain ke keranjang (implementasi sesuai kebutuhan Anda)
     */
    public function addToCart()
    {
        // Contoh proses...
        // session()->push('cart', [...]);

        session()->flash('success', 'Desain berhasil ditambahkan ke keranjang.');
    }

    /**
     * Render halaman dengan layout utama
     */
    public function render()
    {
        return view('livewire.design.index')
            ->layout('layouts.app');
    }
}
