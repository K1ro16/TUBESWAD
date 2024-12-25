<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - {{ $event->nama_event }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <h1 class="text-3xl font-bold mb-6">Edit Event</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama_event" class="block text-sm font-medium text-gray-700">Nama Event</label>
                    <input type="text" name="nama_event" id="nama_event" value="{{ $event->nama_event }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ $event->deskripsi }}</textarea>
                </div>

                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ $event->lokasi }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $event->tanggal }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                        <input type="time" name="waktu" id="waktu" value="{{ date('H:i', strtotime($event->waktu)) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="harga" id="harga" value="{{ $event->harga }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="penyelenggara" class="block text-sm font-medium text-gray-700">Penyelenggara</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" value="{{ $event->penyelenggara }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" name="category" id="category" value="{{ $event->category }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label for="poster" class="block text-sm font-medium text-gray-700">Poster (JPG/PNG)</label>
                    @if($event->poster)
                        <div class="mt-2">
                            <img src="{{ Storage::url($event->poster) }}" alt="Current poster" class="h-32 object-cover">
                        </div>
                    @endif
                    <input type="file" name="poster" id="poster" class="mt-1 block w-full" accept="image/jpeg,image/png">
                </div>

                <div>
                    <label for="surat" class="block text-sm font-medium text-gray-700">Surat (PDF)</label>
                    <input type="file" name="surat" id="surat" class="mt-1 block w-full" accept="application/pdf">
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('event.show', $event->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 