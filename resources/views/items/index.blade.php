@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Cari Barang Hilang / Ditemukan</h1>

<!-- Form Pencarian -->
<form action="{{ route('items.index') }}" method="GET" class="flex gap-2 mb-8">
    <input type="text" name="search" value="{{ $keyword }}" placeholder="Ketik nama barang atau lokasi..." class="border p-3 rounded w-full shadow-sm focus:outline-blue-500">
    <button class="bg-[#00743f] text-white px-8 rounded-lg shadow hover:bg-[#005c32] font-bold transition">Cari</button>
</form>

<!-- Grid Barang -->
@if($items->isEmpty())
    <div class="bg-white p-8 text-center rounded shadow text-gray-500">
        Belum ada data barang yang cocok.
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="bg-white p-5 rounded-lg shadow-md hover:shadow-lg transition">
                <!-- Placeholder gambar -->
                <!-- Tampilan Gambar -->
                @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_barang }}" class="h-40 w-full object-cover rounded mb-4">
                @else
                    <div class="h-40 bg-gray-200 rounded mb-4 flex items-center justify-center text-gray-400">Tanpa Foto</div>
                @endif
                
                <h2 class="font-bold text-xl text-gray-800">{{ $item->nama_barang }}</h2>
                <p class="text-gray-600 mb-2">📍 {{ $item->lokasi }}</p>
                
                <!-- Label Status -->
                <span class="inline-block px-3 py-1 text-sm rounded-full font-semibold {{ $item->status == 'hilang' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                    {{ ucfirst($item->status) }}
                </span>
                
                <a href="{{ route('items.show', $item) }}" class="block mt-4 text-center bg-gray-100 text-gray-700 py-2 rounded hover:bg-gray-200">Lihat Detail</a>
            </div>
        @endforeach
    </div>
@endif
@endsection