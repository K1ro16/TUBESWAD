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
        // Ambil semua data komunitas
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat komunitas baru
        return view('communities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'city' => 'required',
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Menyimpan gambar
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = null;
        }
    
        // Menyimpan data komunitas ke database
        Community::create([
            'name' => $request->name,
            'category' => $request->category,
            'city' => $request->city,
            'description' => $request->description,
            'image_path' => $logoPath,
        ]);
    
        return redirect()->route('communities.index')->with('success', 'Community created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail komunitas berdasarkan ID
        $community = Community::findOrFail($id);
        return view('communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data komunitas yang akan diedit
        $community = Community::findOrFail($id);
        return view('communities.edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'city' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Temukan komunitas yang akan diupdate
        $community = Community::findOrFail($id);
    
        // Update data komunitas
        $community->name = $request->name;
        $community->category = $request->category;
        $community->city = $request->city;
        $community->description = $request->description;
    
        // Cek jika ada logo baru yang diunggah
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($community->image_path) {
                Storage::delete('public/' . $community->image_path);
            }
    
            // Simpan logo baru
            $imagePath = $request->file('logo')->store('communities', 'public');
            $community->image_path = $imagePath;
        }
    
        // Simpan perubahan ke database
        $community->save();
    
        return redirect()->route('communities.index')->with('success', 'Community updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data komunitas berdasarkan ID
        $community = Community::findOrFail($id);
        $community->delete();

        return redirect()->route('communities.index')->with('success', 'Community deleted successfully!');
    }
}
