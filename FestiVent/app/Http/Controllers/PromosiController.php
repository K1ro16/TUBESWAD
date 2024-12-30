<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promosi;

class PromosiController extends Controller
{
    /**
     * Menampilkan daftar promosi.
     */
    public function index()
    {
        $promosi = Promosi::all(); // Mengambil semua data promosi
        return view('admin.promosi', compact('promosi')); // Menampilkan data ke view
    }

    /**
     * Menampilkan form untuk membuat promosi baru.
     */
    public function create()
    {
        return view('promosi.create'); // Menampilkan form untuk tambah data
    }

    /**
     * Menyimpan data promosi baru.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'diskon' => 'required|integer|min:0|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Simpan data ke database
        Promosi::create($request->all());

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail promosi.
     */
    public function show($id)
    {
        $promosi = Promosi::findOrFail($id); // Cari data berdasarkan ID
        return view('promosi.show', compact('promosi')); // Tampilkan detail data
    }

    /**
     * Menampilkan form untuk mengedit promosi.
     */
    public function edit($id)
    {
        $promosi = Promosi::findOrFail($id); // Cari data berdasarkan ID
        return view('promosi.edit', compact('promosi')); // Tampilkan form edit
    }

    /**
     * Memperbarui data promosi.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'diskon' => 'required|integer|min:0|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Update data di database
        $promosi = Promosi::findOrFail($id);
        $promosi->update($request->all());

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil diperbarui!');
    }

    /**
     * Menghapus data promosi.
     */
    public function destroy($id)
    {
        $promosi = Promosi::findOrFail($id); // Cari data berdasarkan ID
        $promosi->delete(); // Hapus data

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil dihapus!');
    }
}
