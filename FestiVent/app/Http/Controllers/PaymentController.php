<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data payments
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat payment baru
        return view('payments.create');
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
            'opsi_pay' => 'required|string',
            'kode' => 'required|string|unique:payments,kode',
        ]);

        // Simpan data ke database
        $payment = Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data payment berdasarkan ID
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments.index')->with('error', 'Payment not found');
        }

        return view('payments.show', compact('payment'));
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
