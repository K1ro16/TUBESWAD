<!-- resources/views/requests/create.blade.php -->
@extends('requests.index')

@section('content')
<div class="container">
    <h1>Buat Request Baru</h1>

    <form action="{{ route('requests.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" id="nama_event" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="datetime-local" name="waktu" id="waktu" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" min="0" required>
        </div>

        <div class="form-group">
            <label for="nama_komunitas">nama penyelenggara</label>
            <input type="text" name="nama_komunitas" id="nama_komunitas" class="form-control" required>
        </div>

        {{-- <div class="form-group">
            <label for="community_id">Community</label>
            <select name="community_id" id="community_id" class="form-control">
                <option value="">Pilih Community (Opsional)</option>
                <!-- Daftar community bisa ditarik dari model Community -->
                @foreach ($communities as $community)
                    <option value="{{ $community->id }}">{{ $community->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
