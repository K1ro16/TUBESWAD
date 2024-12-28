<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Menampilkan semua feedback
    public function index()
    {
        $feedbacks = Feedback::all(); // Mengambil semua data feedback
        return view('feedback.index', compact('feedbacks')); // Return ke view feedback.index
    }

    // Menampilkan form untuk membuat feedback baru
    public function create()
    {
        return view('feedback.create'); // Return ke view feedback.create
    }

    // Menyimpan feedback baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        Feedback::create($request->all()); // Simpan data ke database

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil ditambahkan.');
    }

    // Menampilkan detail feedback
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id); // Cari data feedback berdasarkan ID
        return view('feedback.show', compact('feedback')); // Return ke view feedback.show
    }

    // Menampilkan form untuk mengedit feedback
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id); // Cari data feedback berdasarkan ID
        return view('feedback.edit', compact('feedback')); // Return ke view feedback.edit
    }

    // Memperbarui feedback
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        $feedback = Feedback::findOrFail($id); // Cari data feedback berdasarkan ID
        $feedback->update($request->all()); // Update data di database

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil diperbarui.');
    }

    // Menghapus feedback
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id); // Cari data feedback berdasarkan ID
        $feedback->delete(); // Hapus data dari database

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dihapus.');
    }
}
