<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    // Tampilkan semua data akun
    public function index()
    {
        $accounts = Accounts::all();
        return response()->json($accounts);
    }

    // Tampilkan detail akun berdasarkan ID
    public function show($id)
    {
        $account = Accounts::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return response()->json($account);
    }

    // Tambahkan akun baru
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:accounts,email',
        'password' => 'required|string|min:6',
    ]);

    Accounts::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);


    return redirect()->route('signin')->with('success', 'Account created successfully!');
}


    // Perbarui data akun berdasarkan ID
    public function update(Request $request, $id)
    {
        $account = Accounts::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $request->validate([
            'nama' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:accounts,email,' . $id,
            'password' => 'sometimes|string|min:6',
        ]);

        if ($request->has('nama')) {
            $account->nama = $request->nama;
        }

        if ($request->has('email')) {
            $account->email = $request->email;
        }

        if ($request->has('password')) {
            $account->password = Hash::make($request->password);
        }

        $account->save();

        return response()->json($account);
    }

    // Hapus akun berdasarkan ID
    public function destroy($id)
    {
        $account = Accounts::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $account->delete();

        return response()->json(['message' => 'Account deleted successfully']);
    }

    // Tambahkan metode login di sini
    public function login(Request $request)
{
    if (session()->has('account_id')) {
        return redirect()->route('home');
    }

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    // Check for admin credentials
    if ($request->email === 'admin@gmail.com' && $request->password === 'admin123') {
        session(['account_id' => 'admin']);
        return redirect('/admin/communities');
    }

    $account = Accounts::where('email', $request->email)->first();

    if (!$account || !Hash::check($request->password, $account->password)) {
        return redirect()->back()->withErrors(['login' => 'Invalid email or password']);
    }
    session(['account_id' => $account->id]);

    $adminEmail = 'admin@gmail.com'; // Replace with the actual admin email
    if ($account->email === $adminEmail) {
        return redirect()->route('communities.index'); // Redirect to communities.index for admin
    }
    return redirect()->route('home')->with('success', 'Login successful');
    }

    public function logout()
{
    session()->forget('account_id');  // Remove the account_id from the session
    return redirect()->route('home')->with('success', 'Logged out successfully');
}


}
