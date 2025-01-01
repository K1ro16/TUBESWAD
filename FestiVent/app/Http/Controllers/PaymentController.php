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
    public function index()
    {
        // Fetch all payments
        $payments = Payment::all();

        // Fetch all events (EventReq)
        $events = EventReq::all();

        // Fetch all promos (optional)
        $promosi = Promosi::all();

        // Pass the payments, events, and promos to the view
        return view('payment.index', compact('payments', 'events', 'promosi'));
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
            'harga' => 'required|integer|min:1',
            'opsi_pay' => 'required|string',
            'kode' => 'required|exists:promosi,id', // Pastikan kode ada di tabel promosi
        ]);        

        // Simpan data ke database
        $payment = Payment::create($request->all());

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
