<!-- resources/views/requests/edit.blade.php -->
@extends('requests.index')

@section('content')
<div class="container">
    <h1>Edit Request</h1>

    <form action="{{ route('requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" id="nama_event" class="form-control" value="{{ old('nama_event', $request->nama_event) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $request->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $request->lokasi) }}" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="datetime-local" name="waktu" id="waktu" class="form-control" value="{{ old('waktu', $request->waktu) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $request->harga) }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="community_id">Community</label>
            <select name="community_id" id="community_id" class="form-control">
                <option value="">Pilih Community (Opsional)</option>
                @foreach ($communities as $community)
                    <option value="{{ $community->id }}" {{ $community->id == old('community_id', $request->community_id) ? 'selected' : '' }}>{{ $community->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
