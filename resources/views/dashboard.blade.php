<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Dashboard</h2></x-slot>

    @php
        $totalProducts = \App\Models\Product::count();
        $totalStock = \App\Models\Product::sum('stock');
        $lowStock = \App\Models\Product::where('stock', '<', 5)->count();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Total Produk</p>
                    <p class="text-3xl font-bold">{{ $totalProducts }}</p>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Total Stok</p>
                    <p class="text-3xl font-bold">{{ $totalStock }}</p>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Stok Menipis (&lt; 5)</p>
                    <p class="text-3xl font-bold text-red-600">{{ $lowStock }}</p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>
                <a href="{{ route('products.index') }}" class="inline-block mt-4 px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Kelola Produk →</a>
            </div>
        </div>
    </div>
</x-app-layout>