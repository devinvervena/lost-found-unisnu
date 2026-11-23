@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Laporan Barang</h1>

    <form action="{{ route('items.update', $item) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf 
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="w-full border p-3 rounded focus:outline-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi / Ciri-ciri</label>
            <textarea name="deskripsi" class="w-full border p-3 rounded focus:outline-blue-500" rows="3" required>{{ $item->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
            <input type="text" name="lokasi" value="{{ $item->lokasi }}" class="w-full border p-3 rounded focus:outline-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="status" class="w-full border p-3 rounded focus:outline-blue-500">
                <option value="hilang" {{ $item->status == 'hilang' ? 'selected' : '' }}>Hilang</option>
                <option value="ditemukan" {{ $item->status == 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Kontak</label>
            <input type="text" name="kontak" value="{{ $item->kontak }}" class="w-full border p-3 rounded focus:outline-blue-500" required>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-[#00743f] hover:bg-[#005c32] text-white px-6 py-3 rounded font-semibold hover:bg-blue-800 w-full">Update Laporan</button>
            <a href="{{ route('items.show', $item) }}" class="bg-gray-200 text-gray-800 text-center px-6 py-3 rounded font-semibold hover:bg-gray-300 w-full">Batal</a>
        </div>
    </form>
</div>
@endsection