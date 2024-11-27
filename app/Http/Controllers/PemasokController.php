<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Models\Kontrak;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    // Menampilkan daftar pemasok
    public function index()
    {
        // Menampilkan semua pemasok
        $pemasok = Pemasok::with('kontrak')->get();
        return view('user.pemasok.index', compact('pemasok'));
    }

    // Menampilkan form untuk menambahkan pemasok
    public function create()
    {
        // Ambil semua kontrak untuk dropdown
        $kontrak = Kontrak::all();
        return view('user.pemasok.create', compact('kontrak'));
    }

    // Menyimpan pemasok baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'kontrak_id' => 'required|exists:kontrak,id', // Pastikan kontrak_id ada di tabel kontrak
            'rating_pemasok' => 'nullable|integer|min:0|max:5',
        ]);

        // Simpan data pemasok
        Pemasok::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pemasok
    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id); // Ambil pemasok berdasarkan ID
        $kontrak = Kontrak::all(); // Ambil semua kontrak
        return view('user.pemasok.edit', compact('pemasok', 'kontrak'));
    }

    // Memperbarui pemasok
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'kontrak_id' => 'required|exists:kontrak,id',
            'rating_pemasok' => 'nullable|integer|min:0|max:5',
        ]);

        // Ambil data pemasok dan perbarui
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil diperbarui.');
    }

    // Menghapus pemasok
    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus.');
    }
}
