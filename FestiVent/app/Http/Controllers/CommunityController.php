<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Storage;

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
        'kategori' => 'required|string|max:20',
    ]);

    // Simpan gambar ke storage (folder "public/images/communities")
    $imagePath = $request->file('gambar')->store('images/communities', 'public');

    // Simpan data ke database
    Community::create([
        'nama_community' => $request->nama_community,
        'asal' => $request->asal,
        'deskripsi' => $request->deskripsi,
        'gambar' => 'storage/' . $imagePath, // Path yang dapat diakses di view
        'kategori' => $request->kategori,
    ]);

    // Redirect ke halaman index dengan pesan sukses
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
        'kategori' => 'required|string|max:20',
    ]);

    // Update gambar jika ada file baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($community->gambar && Storage::disk('public')->exists($community->gambar)) {
            Storage::disk('public')->delete($community->gambar);
        }
    
        // Simpan gambar baru
        $imagePath = $request->file('gambar')->store('images/communities', 'public');
        $community->gambar = $imagePath; // Gambar disimpan di storage/images/communities
    }    

    // Update data lainnya
    $community->nama_community = $request->nama_community;
    $community->asal = $request->asal;
    $community->deskripsi = $request->deskripsi;
    $community->kategori = $request->kategori;

    // Simpan perubahan ke database
    $community->save();

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
