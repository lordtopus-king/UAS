<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800">Data Produk</h2>
            <div class="flex gap-2">
                <a href="{{ route('products.export.excel') }}" class="px-4 py-2 bg-green-600 text-white rounded-md text-xs uppercase">Export Excel</a>
                <a href="{{ route('products.export.pdf') }}" class="px-4 py-2 bg-red-600 text-white rounded-md text-xs uppercase">Export PDF</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-xs uppercase">+ Tambah Produk</a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="GET" class="mb-4 flex gap-2">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama atau SKU..."
                           class="border-gray-300 rounded-md shadow-sm w-72">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Cari</button>
                </form>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs text-gray-500 uppercase">Nama</th>
                            <th class="px-4 py-3 text-left text-xs text-gray-500 uppercase">SKU</th>
                            <th class="px-4 py-3 text-left text-xs text-gray-500 uppercase">Stok</th>
                            <th class="px-4 py-3 text-left text-xs text-gray-500 uppercase">Harga</th>
                            <th class="px-4 py-3 text-right text-xs text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-4 py-3 text-sm">{{ $product->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $product->sku }}</td>
                                <td class="px-4 py-3 text-sm">{{ $product->stock }}</td>
                                <td class="px-4 py-3 text-sm">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-sm text-right space-x-2">
                                    <a href="{{ route('products.show', $product) }}" class="text-gray-600">Lihat</a>
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('products.edit', $product) }}" class="text-indigo-600">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>