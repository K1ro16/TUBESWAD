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
            background-color: #f0f2f5;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            color: white;
            border-bottom: none;
            border-radius: 20px 20px 0 0 !important;
            padding: 25px;
        }

        .card-body {
            padding: 40px;
        }

        .form-control, .form-select {
            border-radius: 15px;
            padding: 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.1);
            transform: translateY(-2px);
        }

        .event-details {
            background: linear-gradient(to right, #ffffff, #f8f9fa);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #0d6efd;
        }

        .price-display {
            background: linear-gradient(45deg, #e7f1ff, #f8f9fa);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .price-display::after {
            content: '💰';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            opacity: 0.2;
        }

        .form-label {
            font-weight: 600;
            color: #344767;
            margin-bottom: 10px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .total-price {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            color: white;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            position: relative;
        }

        .total-price p {
            color: rgba(255, 255, 255, 0.8);
        }

        .total-price h3 {
            font-size: 2rem;
            font-weight: 700;
        }

        .btn-primary {
            padding: 15px;
            border-radius: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        }

        .btn-primary::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .btn-primary:hover::after {
            transform: rotate(45deg) translateY(-50%);
        }

        /* Payment Method Icons */
        .payment-method-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            vertical-align: middle;
        }

        /* Success Modal */
        .modal-content {
            border-radius: 20px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 20px;
        }

        .modal-body {
            padding: 30px;
            text-align: center;
        }

        .modal-footer {
            border-top: none;
            padding: 20px;
        }

        /* Input Group Styling */
        .input-group-text {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 15px 0 0 15px;
        }

        /* Hover Effects */
        .list-group-item {
            border-radius: 15px !important;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            transform: translateX(5px);
            background-color: #f8f9fa;
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

                                <button type="button" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#successModal">
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

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Payment Successful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your payment has been processed successfully!
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
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

    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        $('#successModal').modal('show');
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
