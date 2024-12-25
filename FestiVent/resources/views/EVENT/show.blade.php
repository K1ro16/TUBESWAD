<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->nama_event }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            @if($event->poster)
                <img src="{{ Storage::url($event->poster) }}" alt="{{ $event->nama_event }}" class="w-full h-96 object-cover">
            @endif
            
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $event->nama_event }}</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Detail Event</h2>
                        <div class="space-y-2">
                            <p><span class="font-semibold">Tanggal:</span> {{ $event->tanggal }}</p>
                            <p><span class="font-semibold">Waktu:</span> {{ $event->waktu }}</p>
                            <p><span class="font-semibold">Lokasi:</span> {{ $event->lokasi }}</p>
                            <p><span class="font-semibold">Harga:</span> Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
                            <p><span class="font-semibold">Penyelenggara:</span> {{ $event->penyelenggara }}</p>
                            @if($event->category)
                                <p><span class="font-semibold">Kategori:</span> {{ $event->category }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Deskripsi</h2>
                        <p class="text-gray-600">{{ $event->deskripsi }}</p>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('event.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                    <div class="space-x-4">
                        <a href="{{ route('event.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 