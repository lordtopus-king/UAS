@php $product = $product ?? null; @endphp

<div>
    <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">SKU</label>
    <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('sku') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
    <textarea name="description" rows="3"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Stok</label>
        <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('stock') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
        <input type="number" name="price" min="0" step="0.01" value="{{ old('price', $product->price ?? 0) }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('price') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
</div>