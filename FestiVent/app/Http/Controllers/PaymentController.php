<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Promosi;
use App\Models\EventReq;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($eventId = null)
    {
        // Fetch all payments
        $payments = Payment::all();

        // Fetch all events (EventReq)
        $events = EventReq::all();

        // Fetch all promos (optional)
        $promosi = Promosi::all();

        // Fetch selected event if the eventId is passed
        $selectedEvent = null;
        if ($eventId) {
            $selectedEvent = EventReq::find($eventId);
        }

        // Pass the payments, events, promos, and selected event to the view
        return view('payment.index', compact('payments', 'events', 'promosi', 'selectedEvent'));
    }


    public function create()
    {
        $promosi = Promosi::all();
        return view('payment.index', compact('promosi')); // Tambahkan data promosi
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:15',
            'email' => 'required|email',
            'jml_tiket' => 'required|integer|min:1',
            'eventreq_id' => 'required|exists:eventreq,id', // Validasi relasi eventreq
            'opsi_pay' => 'required|string',
            'kode' => 'nullable|exists:promosi,id', // Kode promo opsional
        ]);

        // Ambil data event berdasarkan ID
        $event = EventReq::findOrFail($request->eventreq_id);

        // Hitung harga berdasarkan jumlah tiket dan harga per tiket
        $totalHarga = $event->harga * $request->jml_tiket;

        // Periksa jika ada diskon/promosi
        if ($request->kode) {
            $promo = Promosi::findOrFail($request->kode);
            $totalHarga -= ($totalHarga * $promo->diskon / 100); // Terapkan diskon
        }

        // Simpan data ke database
        $payment = new Payment([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'jml_tiket' => $request->jml_tiket,
            'harga' => $totalHarga,
            'opsi_pay' => $request->opsi_pay,
            'kode' => $request->kode,
            'eventreq_id' => $request->eventreq_id, // Simpan relasi
        ]);
        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data payment berdasarkan ID
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payment.index')->with('error', 'Payment not found');
        }

        return view('payment.index', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
