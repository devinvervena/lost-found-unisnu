@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md mt-6">
    <div class="flex justify-between items-start mb-4">
        <h1 class="text-3xl font-bold text-gray-800">{{ $item->nama_barang }}</h1>
        <span class="px-4 py-2 rounded-full font-semibold {{ $item->status == 'hilang' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
            {{ ucfirst($item->status) }}
        </span>
    </div>

    <div class="mb-6">
        <p class="text-gray-600 font-semibold mb-1">Deskripsi / Ciri-ciri:</p>
        <p class="text-gray-800">{{ $item->deskripsi }}</p>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600 font-semibold mb-1">Lokasi:</p>
            <p class="text-gray-800">📍 {{ $item->lokasi }}</p>
        </div>
        <div>
            <p class="text-gray-600 font-semibold mb-1">Kontak Pelapor:</p>
            <p class="text-gray-800">📞 {{ $item->kontak }}</p>
        </div>
    </div>

    <!-- Tombol Aksi (Hanya muncul jika pemilik laporan yang login) -->
    @auth
        @if(auth()->id() === $item->user_id)
            <div class="flex gap-3 mt-8 pt-6 border-t">
                <a href="{{ route('items.edit', $item) }}" class="bg-yellow-400 text-green-900 font-bold text-white px-6 py-2 rounded font-semibold hover:bg-yellow-600">Edit Laporan</a>
                
                <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded font-semibold hover:bg-red-700">Hapus Laporan</button>
                </form>
            </div>
        @endif
    @endauth

    <div class="mt-6">
        <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">← Kembali ke Beranda</a>
    </div>
</div>
@endsection