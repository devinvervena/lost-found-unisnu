<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lost & Found UNISNU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <h1 class="text-3xl font-bold mb-4">Daftar Barang (Test Devin)</h1>
    
    <!-- Form Pencarian -->
    <form action="{{ route('items.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" value="{{ $keyword }}" placeholder="Cari barang..." class="border p-2 rounded w-1/3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
    </form>

    <!-- List Barang -->
    @if($items->isEmpty())
        <p>Belum ada data barang.</p>
    @else
        <ul>
            @foreach($items as $item)
                <li class="bg-white p-4 mb-2 rounded shadow">
                    <b>{{ $item->nama_barang }}</b> - {{ $item->lokasi }} 
                    (Status: {{ $item->status }})
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>