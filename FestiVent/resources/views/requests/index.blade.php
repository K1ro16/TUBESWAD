<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Event</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>Waktu</th>
            <th>Nama Penyelenggara</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $request->nama_event }}</td>
                <td>{{ $request->deskripsi }}</td>
                <td>{{ $request->lokasi }}</td>
                <td>{{ $request->waktu }}</td>
                <td>{{ $request->nama_komunitas }}</td>
                <td>
                    <a href="{{ route('requests.show', $request->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
