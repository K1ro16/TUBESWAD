<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Community;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event
        $events = Event::with('community')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua komunitas untuk dropdown
        $communities = Community::all();
        return view('events.create', compact('communities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_event' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:100',
            'waktu' => 'required|string|max:50', // Format waktu tergantung implementasi
            'harga' => 'required|integer|min:0',
            'community_id' => 'required|exists:communities,id',
        ]);

        // Simpan data ke database
        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Menampilkan detail event
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Mengambil semua komunitas untuk dropdown
        $communities = Community::all();
        return view('events.edit', compact('event', 'communities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Validasi input
        $request->validate([
            'nama_event' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:100',
            'waktu' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'community_id' => 'required|exists:communities,id',
        ]);

        // Update data di database
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Hapus event
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }
}
