<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventReq;

class EventReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all events and return as JSON
        $events = EventReq::all();
        return response()->json($events);
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
            'waktu' => 'required|string', // Use 'date' if waktu is a valid date
            'harga' => 'required|integer',
            'penyelenggara' => 'required|string',
        ]);

        // Create a new event
        $event = EventReq::create($validatedData);

        return response()->json(['message' => 'Event created successfully!', 'event' => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the event by ID or fail
        $event = EventReq::findOrFail($id);
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama_event' => 'sometimes|string|max:255',
            'deskripsi' => 'sometimes|string',
            'lokasi' => 'sometimes|string',
            'waktu' => 'sometimes|string', // Use 'date' if waktu is a valid date
            'harga' => 'sometimes|integer',
            'penyelenggara' => 'sometimes|string',
        ]);

        // Find the event and update
        $event = EventReq::findOrFail($id);
        $event->update($validatedData);

        return response()->json(['message' => 'Event updated successfully!', 'event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the event and delete
        $event = EventReq::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully!']);
    }
}
