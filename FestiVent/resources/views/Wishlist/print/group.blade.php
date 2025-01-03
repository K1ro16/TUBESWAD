<!DOCTYPE html>
<html>
<head>
    <title>{{ $group->name }} - Wishlist</title>
    <style>
        /* setting tampilan cetak */
        @media print {
            .no-print {
                display: none; /* hide element yang ngak diperluin */
            }
        }

        /* setting body */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        /* styling header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
        }

        /* styling button print */
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

        /* container daftar event */
        .event-list {
            width: 100%;
        }

        /* Styling item event */
        .event-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            page-break-inside: avoid;
        }

        /* Styling judul */
        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        /* Styling detail */
        .event-details {
            font-size: 14px;
            color: #666;
        }

        /* Margin paragraf detail event */
        .event-details p {
            margin: 5px 0;
        }

        /* margin halaman */
        @page {
            margin: 2cm;
        }
    </style>
</head>
<body>
    <!-- Tombol print-->
    <button onclick="window.print()" class="print-button no-print">
        Print Wishlist
    </button>

    <!-- Header isinya nama group dan tanggal -->
    <div class="header">
        <h1>{{ $group->name }}</h1>
        <p>Generated on {{ now()->format('F j, Y') }}</p>
    </div>

    <!-- Daftar event dalam group -->
    <div class="event-list">
        @forelse($group->wishlists as $wishlist)
            <!-- card buat setiap eventnya -->
            <div class="event-item">
                <!-- Judul event -->
                <div class="event-title">{{ $wishlist->event->nama_event }}</div>
                <!-- Detail event -->
                <div class="event-details">
                    <p><strong>Location:</strong> {{ $wishlist->event->lokasi }}</p>
                    <p><strong>Date:</strong> {{ $wishlist->event->tanggal }}</p>
                    <p><strong>Time:</strong> {{ $wishlist->event->waktu }}</p>
                    <p><strong>Price:</strong> Rp {{ number_format($wishlist->event->harga, 0, ',', '.') }}</p>
                    <p><strong>Description:</strong> {{ Str::limit($wishlist->event->deskripsi, 150) }}</p>
                </div>
            </div>
        @empty
            <!-- Kalo ngak ada event -->
            <p>No events in this group.</p>
        @endforelse
    </div>

    <!-- Script auto print (ngak jadi make) -->
    <script>
        // Fungsi untuk membuka dialog cetak otomatis saat halaman dimuat
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html> 