<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('communities.index');
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
        $community = Community::create([
            'name' => $request->name,
            'category' => $request->category,
            'city' => $request->city,
            'description' => $request->description,
            'image_path' => $logoPath,
        ]);

        session(['community_id' => $community->id]);

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
        if ($request->has('redirect')) {
            return redirect($request->get('redirect'));
        }
        return redirect()->route('communities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // Hapus data komunitas berdasarkan ID
        $community = Community::findOrFail($id);
        $community->delete();

        if ($request->has('redirect')) {
            return redirect($request->get('redirect'));
        }
        return redirect()->route('communities.index');
    }

    public function showAdminDashboard()
    {
        $community = Community::all(); // mengambil event dari database
        return view('admin.communities', compact('communities'));
    }

    public function exportToExcel()
    {
        $fileName = 'communities.xls';
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $columns = ['Name', 'Category', 'City', 'Description'];

        $callback = function () use ($columns) {
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>" . htmlspecialchars($column) . "</th>";
            }
            echo "</tr>";

            $communities = Community::all();
            foreach ($communities as $community) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($community->name) . "</td>";
                echo "<td>" . htmlspecialchars($community->category) . "</td>";
                echo "<td>" . htmlspecialchars($community->city) . "</td>";
                echo "<td>" . htmlspecialchars($community->description) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        };

        return response()->stream($callback, Response::HTTP_OK, $headers);
    }
}
