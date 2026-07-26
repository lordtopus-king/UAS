<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Detail Produk</h2></x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-3">
                <div><p class="text-xs text-gray-500 uppercase">Nama</p><p>{{ $product->name }}</p></div>
                <div><p class="text-xs text-gray-500 uppercase">SKU</p><p>{{ $product->sku }}</p></div>
                <div><p class="text-xs text-gray-500 uppercase">Deskripsi</p><p>{{ $product->description ?: '-' }}</p></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><p class="text-xs text-gray-500 uppercase">Stok</p><p>{{ $product->stock }}</p></div>
                    <div><p class="text-xs text-gray-500 uppercase">Harga</p><p>Rp{{ number_format($product->price, 0, ',', '.') }}</p></div>
                </div>
                <div class="pt-4 flex gap-2">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('products.edit', $product) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Edit</a>
                    @endif
                    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded-md text-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>