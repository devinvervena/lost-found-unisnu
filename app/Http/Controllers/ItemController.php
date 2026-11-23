<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // 1. Tampil Data + Pencarian
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $items = Item::when($keyword, function ($q) use ($keyword) {
            return $q->where('nama_barang', 'like', "%{$keyword}%")
                     ->orWhere('lokasi', 'like', "%{$keyword}%");
        })->latest()->paginate(9);
        return view('items.index', compact('items', 'keyword'));
    }

    // 2. Form Tambah
    public function create() { return view('items.create'); }

    // 3. Simpan Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required', 'deskripsi' => 'required',
            'lokasi' => 'required', 'status' => 'required', 'kontak' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('items', 'public');
        }
        $validated['user_id'] = auth()->id();
        Item::create($validated);
        return redirect()->route('items.index')->with('success', 'Laporan ditambahkan!');
    }

    // 4. Detail (dibutuhkan Arya nanti)
    public function show(Item $item) { return view('items.show', compact('item')); }
    
    // 5. Edit & Update (bisa dilanjutkan Ilham nanti)

        // Fungsi untuk menampilkan form edit
    public function edit(Item $item)
    {
        // Cek apakah yang mau edit adalah pemilik laporannya
        if ($item->user_id !== auth()->id()) {
            abort(403, 'Anda tidak berhak mengedit laporan ini.');
        }
        return view('items.edit', compact('item'));
    }

    // Fungsi untuk menyimpan perubahan
    public function update(Request $request, Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'nama_barang' => 'required', 
            'deskripsi' => 'required',
            'lokasi' => 'required', 
            'status' => 'required', 
            'kontak' => 'required',
        ]);

        $item->update($validated);
        return redirect()->route('items.index')->with('success', 'Laporan berhasil diupdate!');
    }

    // Fungsi untuk menghapus
    public function destroy(Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            abort(403);
        }
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Laporan berhasil dihapus!');
    }
}