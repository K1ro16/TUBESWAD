<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventReq;
use Illuminate\Support\Facades\Storage;
use App\Models\Wishlist;
use Illuminate\Http\Response;

class EventReqController extends Controller
{
    public function index()
    {
        $events = EventReq::all();
        return view('eventreq.index', compact('events'));
    }

    public function create()
    {
        return view('eventreq.create');
    }

    public function store(Request $request)
    {
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

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validatedData['poster'] = $posterPath;
        }
        EventReq::create($validatedData);

        return redirect()->route('home')->with('success', 'Event created successfully! ✨');
    }

    public function show(string $id)
    {
        $event = EventReq::findOrFail($id);
        return view('eventreq.show', compact('event'));
    }

    public function edit(string $id)
    {
        $event = EventReq::findOrFail($id);
        return view('eventreq.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
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

        $event = EventReq::findOrFail($id);

        if ($request->hasFile('poster')) {
            if ($event->poster && Storage::disk('public')->exists($event->poster)) {
                Storage::disk('public')->delete($event->poster);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validatedData['poster'] = $posterPath;
        }

        $event->update($validatedData);

        return redirect()->route('eventreq.index', $event->id)->with('success', 'Event updated successfully!');
    }

    public function destroy(string $id)
    {
        $event = EventReq::findOrFail($id);

        if ($event->poster && Storage::disk('public')->exists($event->poster)) {
            Storage::disk('public')->delete($event->poster);
        }

        $event->delete();

        return redirect()->route('eventreq.index')->with('success', 'Event deleted successfully!');
    }

    public function showAdminDashboard()
    {
        $events = EventReq::all();
        return view('admin.index', compact('events'));
    }

    public function showHome()
    {
        $eventreqs = EventReq::all();
        $communities = \App\Models\Community::all();

        $wishlisted = [];
        if (session('accounts_id')) {
            $wishlisted = Wishlist::where('accounts_id', session('accounts_id'))
                ->pluck('eventreq_id')
                ->toArray();
        }

        return view('home', [
            'eventreqs' => $eventreqs,
            'communities' => $communities,
            'wishlisted' => $wishlisted
        ]);
    }

    public function showCategory($category = null)
    {
        if ($category) {
            $events = EventReq::where('category', $category)->get();
        } else {
            $events = EventReq::all();
        }

        $categories = [
            'Community Gathering',
            'Sports',
            'Live Show',
            'Festival',
            'Music'
        ];

        return view('eventreq.Category', compact('events', 'categories', 'category'));
    }

    public function exportToExcel()
    {
        $fileName = 'eventreqs.xls';
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $columns = ['Nama Event', 'Deskripsi', 'Lokasi', 'Waktu', 'Tanggal', 'Harga', 'Penyelenggara', 'Category'];

        $callback = function () use ($columns) {
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>" . htmlspecialchars($column) . "</th>";
            }
            echo "</tr>";

            $events = EventReq::all();
            foreach ($events as $event) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($event->nama_event) . "</td>";
                echo "<td>" . htmlspecialchars($event->deskripsi) . "</td>";
                echo "<td>" . htmlspecialchars($event->lokasi) . "</td>";
                echo "<td>" . htmlspecialchars($event->waktu) . "</td>";
                echo "<td>" . htmlspecialchars($event->tanggal) . "</td>";
                echo "<td>" . htmlspecialchars($event->harga) . "</td>";
                echo "<td>" . htmlspecialchars($event->penyelenggara) . "</td>";
                echo "<td>" . htmlspecialchars($event->category) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        };

        return response()->stream($callback, Response::HTTP_OK, $headers);
    }
}
