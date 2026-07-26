<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Produk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px 8px; text-align: left; }
        th { background-color: #eee; }
        h2 { margin-bottom: 0; }
        p.subtitle { margin-top: 4px; color: #666; }
    </style>
</head>
<body>
    <h2>Data Produk</h2>
    <p class="subtitle">Dicetak pada {{ now()->format('d M Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>SKU</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>