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
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
            'rating' => 'required'
        ]);

        Feedback::create($request->all()); // Simpan data ke database

        return redirect()->route('feedback.index')
                        ->with('success', 'Thank you! Your feedback has been submitted successfully.');
    }

    // Menampilkan detail feedback
    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback')); // Return ke view feedback.show
    }

    // Menampilkan form untuk mengedit feedback
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback')); // Return ke view feedback.edit
    }

    // Memperbarui feedback
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
            'rating' => 'required'
        ]);

        $feedback->update($request->all()); // Update data di database

        return redirect()->route('feedback.index')
                        ->with('success', 'Feedback updated successfully!');
    }

    // Menghapus feedback
    public function destroy(Feedback $feedback)
    {
        $feedback->delete(); // Hapus data dari database

        return redirect()->route('feedback.index')
                        ->with('success', 'Feedback deleted successfully!');
    }

    public function reply(Request $request, Feedback $feedback)
    {
        $request->validate([
            'reply' => 'required'
        ]);

        $feedback->update([
            'reply' => $request->reply,
            'replied_at' => now()
        ]);

        return redirect()->route('feedback.index')
                        ->with('success', 'Reply added successfully!');
    }

    public function print($id = null)
    {
        if ($id) {
            $feedbacks = Feedback::where('id', $id)->get();
        } else {
            $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        }
        
        return view('Feedback.print', compact('feedbacks'));
    }
}
