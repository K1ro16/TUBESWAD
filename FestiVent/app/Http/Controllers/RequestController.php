<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests; // Pastikan model sudah dibuat

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan semua data request.
     */
    public function index()
    {
        $requests = Requests::all(); // Mengambil semua data dari tabel requests
        return view('requests.index', compact('requests')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk membuat request baru.
     */
    public function create()
    {
        return view('requests.create'); // Menampilkan view form create
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan request baru ke database.
     */
    public function store(Request $request) // Changed $requests to $request
{
    $validated = $request->validate([ // Using $request here
        'nama_event' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'lokasi' => 'required|string',
        'waktu' => 'required|string',
        'harga' => 'required|integer|min:0',
        'nama_komunitas' => 'required|string', // Validasi relasi
    ]);

    Requests::create($validated); // Simpan data ke database
    return redirect()->route('requests.index')->with('success', 'Request berhasil dibuat!');
}


    /**
     * Display the specified resource.
     * Menampilkan detail request berdasarkan ID.
     */
    public function show(string $id)
{
    $request = Requests::findOrFail($id); // Correct variable name here
    return view('requests.show', compact('request')); // Use 'request' here, not 'requests'
}


    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit data request.
     */
    public function edit(string $id)
{
    $request = Requests::findOrFail($id); // Correct variable name here
    return view('requests.edit', compact('request')); // Use 'request' here, not 'requests'
}

    /**
     * Update the specified resource in storage.
     * Memperbarui data request di database.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([ // Correct variable name here
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'waktu' => 'required|string',
            'harga' => 'required|integer|min:0',
            'nama_komunitas' => 'required|string',
        ]);

        $requestData = Requests::findOrFail($id); // Correct variable name here
        $requestData->update($validated); // Update data
        return redirect()->route('requests.index')->with('success', 'Request berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     * Menghapus data request dari database.
     */
    public function destroy(string $id)
    {
        $request = Requests::findOrFail($id); // Cari data berdasarkan ID
        $request->delete(); // Hapus data
        return redirect()->route('requests.index')->with('success', 'Request berhasil dihapus!');
    }
}
