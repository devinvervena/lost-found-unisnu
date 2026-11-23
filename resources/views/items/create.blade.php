@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Lapor Barang Baru</h1>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" class="w-full border p-3 rounded focus:outline-blue-500" placeholder="Contoh: Dompet Hitam" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi / Ciri-ciri</label>
            <textarea name="deskripsi" class="w-full border p-3 rounded focus:outline-blue-500" rows="3" placeholder="Contoh: Dompet kulit ada KTM di dalamnya" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Lokasi Hilang / Ditemukan</label>
            <input type="text" name="lokasi" class="w-full border p-3 rounded focus:outline-blue-500" placeholder="Contoh: Gedung A Lantai 1" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="status" class="w-full border p-3 rounded focus:outline-blue-500">
                <option value="hilang">Hilang</option>
                <option value="ditemukan">Ditemukan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Kontak (No. WA/HP)</label>
            <input type="text" name="kontak" class="w-full border p-3 rounded focus:outline-blue-500" placeholder="Contoh: 08123456789" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Foto Barang (Opsional)</label>
            <input type="file" name="foto" class="w-full border p-2 rounded bg-gray-50">
        </div>

        <button type="submit" class="bg-[#00743f] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#005c32] transition w-full shadow-md">Simpan Laporan</button>
    </form>
</div>
@endsection