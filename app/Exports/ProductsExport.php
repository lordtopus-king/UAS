<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::latest()->get();
    }

    public function headings(): array
    {
        return ['Nama', 'SKU', 'Deskripsi', 'Stok', 'Harga'];
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->sku,
            $product->description,
            $product->stock,
            $product->price,
        ];
    }
}