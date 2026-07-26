<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Edit Produk</h2></x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('products.update', $product) }}" class="space-y-4">
                    @csrf @method('PUT')
                    @include('products._form')
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded-md text-sm">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>