<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Payments</h1>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Payment Form --}}
    <div class="card mb-4">
        <div class="card-header">Create New Payment</div>
        <div class="card-body">
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_tlp" class="form-label">Phone Number</label>
                    <input type="text" id="no_tlp" name="no_tlp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="eventreq_id" class="form-label">Event</label>
                    <select id="eventreq_id" name="eventreq_id" class="form-select" required>
                        <option value="">-- Choose Event --</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}"
                                {{ $selectedEvent && $selectedEvent->id == $event->id ? 'selected' : '' }}>
                                {{ $event->nama_event }} - Rp {{ number_format($event->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>




                <div class="mb-3">
                    <label for="jml_tiket" class="form-label">Number of Tickets</label>
                    <input type="number" id="jml_tiket" name="jml_tiket" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Promo Code</label>
                    <select id="kode" name="kode" class="form-select">
                        <option value="">-- No Promo --</option>
                        @foreach($promosi as $promo)
                            <option value="{{ $promo->id }}">{{ $promo->kode }} - {{ $promo->diskon }}% Off</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="opsi_pay" class="form-label">Payment Option</label>
                    <input type="text" id="opsi_pay" name="opsi_pay" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    {{-- Payments Table --}}
    <div class="card">
        <div class="card-header">Payment List</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Tickets</th>
                    <th>Total Price</th>
                    <th>Payment Option</th>
                </tr>
                </thead>
                <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->nama }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>{{ $payment->event->nama_event ?? 'N/A' }}</td>
                        <td>{{ $payment->jml_tiket }}</td>
                        <td>{{ $payment->harga }}</td>
                        <td>{{ $payment->opsi_pay }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No payments available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
