<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: none;
        }
        .price-display {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }
        .btn-primary {
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
        .event-details {
            background-color: #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .total-price {
            background-color: #e7f1ff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Payment Details</h4>
                    </div>
                    <div class="card-body">
                        @if($eventreq)
                            <!-- Event Details -->
                            <div class="event-details">
                                <h5 class="mb-3"><i class="fas fa-calendar-alt me-2"></i>Event Information</h5>
                                <p class="mb-2"><strong>Event:</strong> {{ $eventreq->nama_event }}</p>
                                <p class="mb-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($eventreq->tanggal)->format('l, d F Y') }}</p>
                                <p class="mb-0"><strong>Time:</strong> {{ \Carbon\Carbon::parse($eventreq->waktu)->format('H:i') }} WIB</p>
                            </div>

                            <!-- Price Display -->
                            <div class="price-display">
                                <p class="text-muted mb-1">Price per ticket</p>
                                <h3 class="mb-0">Rp {{ number_format($eventreq->harga, 0, ',', '.') }}</h3>
                            </div>

                            <form action="{{ route('payment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="eventreq_id" value="{{ $eventreq->id }}">

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Name</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_tlp" class="form-label">Phone Number</label>
                                    <input type="text" id="no_tlp" name="no_tlp" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jml_tiket" class="form-label">Number of Tickets</label>
                                    <input type="number" id="jml_tiket" name="jml_tiket" class="form-control" min="1" required>
                                </div>

                                <!-- Add payment method selection -->
                                <div class="mb-3">
                                    <label for="opsi_pay" class="form-label">Payment Method</label>
                                    <select id="opsi_pay" name="opsi_pay" class="form-control" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="transfer">Bank Transfer</option>
                                        <option value="ewallet">E-Wallet</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>

                                <!-- Optional promo code -->
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Promo Code (Optional)</label>
                                    <select id="kode" name="kode" class="form-control">
                                        <option value="">Select Promo Code</option>
                                        @foreach($promosi as $promo)
                                            <option value="{{ $promo->id }}">{{ $promo->kode }} - {{ $promo->diskon }}% off</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="total-price">
                                    <p class="text-muted mb-1">Total Amount</p>
                                    <h3 id="total-price" class="mb-0">Rp {{ number_format($eventreq->harga, 0, ',', '.') }}</h3>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-4">
                                    Proceed to Payment
                                </button>
                            </form>
                        @else
                            <!-- Display list of events to choose from -->
                            <h5 class="mb-3">Select an Event</h5>
                            <div class="list-group">
                                @foreach($events as $event)
                                    <a href="{{ route('payment.index', $event->id) }}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $event->nama_event }}</h5>
                                            <small>Rp {{ number_format($event->harga, 0, ',', '.') }}</small>
                                        </div>
                                        <p class="mb-1">{{ \Carbon\Carbon::parse($event->tanggal)->format('l, d F Y') }}</p>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    @if($eventreq)
        function updateTotal() {
            const ticketInput = document.getElementById('jml_tiket');
            const totalPrice = document.getElementById('total-price');
            const price = {{ $eventreq->harga }};
            const quantity = parseInt(ticketInput.value) || 0;
            const total = price * quantity;

            totalPrice.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        document.getElementById('jml_tiket').addEventListener('input', updateTotal);
        updateTotal();
    @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
