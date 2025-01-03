<!DOCTYPE html>
<html>
<head>
    <title>{{ $group->name }} - Wishlist</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .event-list {
            width: 100%;
        }

        .event-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            page-break-inside: avoid;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .event-details {
            font-size: 14px;
            color: #666;
        }

        .event-details p {
            margin: 5px 0;
        }

        @page {
            margin: 2cm;
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">
        Print Wishlist
    </button>

    <div class="header">
        <h1>{{ $group->name }}</h1>
        <p>Generated on {{ now()->format('F j, Y') }}</p>
    </div>

    <div class="event-list">
        @forelse($group->wishlists as $wishlist)
            <div class="event-item">
                <div class="event-title">{{ $wishlist->event->nama_event }}</div>
                <div class="event-details">
                    <p><strong>Location:</strong> {{ $wishlist->event->lokasi }}</p>
                    <p><strong>Date:</strong> {{ $wishlist->event->tanggal }}</p>
                    <p><strong>Time:</strong> {{ $wishlist->event->waktu }}</p>
                    <p><strong>Price:</strong> Rp {{ number_format($wishlist->event->harga, 0, ',', '.') }}</p>
                    <p><strong>Description:</strong> {{ Str::limit($wishlist->event->deskripsi, 150) }}</p>
                </div>
            </div>
        @empty
            <p>No events in this group.</p>
        @endforelse
    </div>

    <script>
        // Automatically open print dialog when page loads
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html> 