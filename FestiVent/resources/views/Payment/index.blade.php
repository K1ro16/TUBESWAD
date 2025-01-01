<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
</head>
<body>
    <h1>Payment Management</h1>

    <!-- Flash messages -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <!-- Navigation -->
    <nav>
        <a href="?action=create">Add New Payment</a>
        <a href="?action=index">View Payments</a>
    </nav>
    <hr>

    <!-- Content Switcher -->
    @if(request('action') === 'create')
        <!-- Create Payment Form -->
        <h2>Add New Payment</h2>

        @if($errors->any())
            <ul style="color: red;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required><br><br>

            <label for="no_tlp">No Telepon:</label>
            <input type="text" name="no_tlp" id="no_tlp" value="{{ old('no_tlp') }}" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required><br><br>

            <label for="jml_tiket">Jumlah Tiket:</label>
            <input type="number" name="jml_tiket" id="jml_tiket" value="{{ old('jml_tiket') }}" required><br><br>

            {{-- Tambahkan kolom harga dengan mengambil nilainya dari database --}}
            @foreach ($payments as $payment)
                <label for="harga">Harga:</label>
                <p>
                    @php
                        // Find the event related to the current payment
                        $event = $events->firstWhere('id', $payment->eventreq_id);
                        $totalHarga = $event ? $event->harga * $payment->jml_tiket : 0;
                    @endphp
                    Rp. {{ number_format($totalHarga, 0, ',', '.') }}
                </p>
            @endforeach




            <label for="opsi_pay">Opsi Pembayaran:</label>
            <select name="opsi_pay" id="opsi_pay" required>
                <option value="credit_card" {{ old('opsi_pay') === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                <option value="bank_transfer" {{ old('opsi_pay') === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                <option value="e-wallet" {{ old('opsi_pay') === 'e-wallet' ? 'selected' : '' }}>E-Wallet</option>
            </select><br><br>

            <label for="kode">Kode Promo:</label>
            <select name="kode" id="kode" required>
                <option value="" disabled selected>Select a promo</option>
                @foreach($promosi as $promo)
                    <option value="{{ $promo->id }}" {{ old('kode') == $promo->id ? 'selected' : '' }}>
                        {{ $promo->judul }}
                    </option>
                @endforeach
            </select>            

            <button type="submit">Submit</button>
        </form>

    @elseif(request('action') === 'show' && request('id'))
        <!-- Show Payment Details -->
        @php
            $payment = $payments->firstWhere('id', request('id'));
        @endphp

        @if($payment)
            <h2>Payment Details</h2>
            <p><strong>ID:</strong> {{ $payment->id }}</p>
            <p><strong>Nama:</strong> {{ $payment->nama }}</p>
            <p><strong>No Telepon:</strong> {{ $payment->no_tlp }}</p>
            <p><strong>Email:</strong> {{ $payment->email }}</p>
            <p><strong>Jumlah Tiket:</strong> {{ $payment->jml_tiket }}</p>
            <p><strong>Opsi Pembayaran:</strong> {{ $payment->opsi_pay }}</p>
            <p><strong>Kode Promo:</strong> {{ $payment->kode }}</p>
        @else
            <p>Payment not found.</p>
        @endif

        <a href="?action=index">Back to List</a>

    @else
        <!-- List Payments -->
        <h2>Payment List</h2>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Jumlah Tiket</th>
                    <th>Opsi Pembayaran</th>
                    <th>Kode Promo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->nama }}</td>
                        <td>{{ $payment->no_tlp }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>{{ $payment->jml_tiket }}</td>
                        <td>{{ $payment->opsi_pay }}</td>
                        <td>{{ $payment->kode }}</td>
                        <td>
                            <a href="?action=show&id={{ $payment->id }}">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No payments available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</body>
</html>
