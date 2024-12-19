<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data komunitas
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat komunitas
        return view('communities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_community' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('gambar')->store('images/communities', 'public');

        // Simpan data ke database
        Community::create([
            'nama_community' => $request->nama_community,
            'asal' => $request->asal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        // Menampilkan detail komunitas
        return view('communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        // Menampilkan form untuk edit komunitas
        return view('communities.edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community)
    {
        // Validasi input
        $request->validate([
            'nama_community' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images/communities', 'public');
            $community->gambar = $imagePath;
        }

        // Update data lainnya
        $community->update([
            'nama_community' => $request->nama_community,
            'asal' => $request->asal,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        // Hapus data komunitas
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil dihapus!');
    }
}
