<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventReq;
use Illuminate\Support\Facades\Storage;

class EventReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all events
        $events = EventReq::all();

        // Return the view with data using compact
        return view('eventreq.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating an event
        return view('eventreq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'waktu' => 'required|date_format:H:i', // Changed this line
            'tanggal' => 'required|date',
            'harga' => 'required|integer',
            'penyelenggara' => 'required|string',
            'category' => 'nullable|string|max:255',
            'poster' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $validatedData['waktu'] = date('H:i:s', strtotime($request->waktu));

        // Handle the poster file upload
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validatedData['poster'] = $posterPath;
        }

        // Create a new event
        EventReq::create($validatedData);



        // Redirect to index with a success message
        return redirect()->route('eventreq.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the event by ID
        $event = EventReq::findOrFail($id);

        // Return the view with data using compact
        return view('eventreq.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the event by ID
        $event = EventReq::findOrFail($id);

        // Return the view for editing using compact
        return view('eventreq.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'waktu' => 'required|date_format:H:i',
            'tanggal' => 'required|date',
            'harga' => 'required|integer',
            'penyelenggara' => 'required|string',
            'category' => 'nullable|string|max:255',
            'poster' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $validatedData['waktu'] = date('H:i:s', strtotime($request->waktu));

        // Find the event by ID
        $event = EventReq::findOrFail($id);


        // Handle the poster file upload if a new file is provided
        if ($request->hasFile('poster')) {
            // Remove old poster if exists
            if ($event->poster && Storage::disk('public')->exists($event->poster)) {
                Storage::disk('public')->delete($event->poster);
            }

            // Store the new poster
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validatedData['poster'] = $posterPath;
        }

        // Update the event with the validated data
        $event->update($validatedData);

        // Redirect to the show page with a success message
        return redirect()->route('eventreq.index', $event->id)->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the event and delete it
        $event = EventReq::findOrFail($id);

        // Delete the poster if exists
        if ($event->poster && Storage::disk('public')->exists($event->poster)) {
            Storage::disk('public')->delete($event->poster);
        }

        // Delete the event
        $event->delete();

        // Redirect to index with a success message
        return redirect()->route('eventreq.index')->with('success', 'Event deleted successfully!');
    }
}
