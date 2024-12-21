<!-- resources/views/requests/show.blade.php -->
@extends('requests.index')

@section('content')
<div class="container">
    <h1>Detail Request</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $request->nama_event }}</h5>
            <p><strong>Deskripsi:</strong> {{ $request->deskripsi }}</p>
            <p><strong>Lokasi:</strong> {{ $request->lokasi }}</p>
            <p><strong>Waktu:</strong> {{ $request->waktu }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($request->harga, 0, ',', '.') }}</p>
            <p><strong>Nama Penyelenggara:</strong> {{ $request->nama_komunitas}}</p>
            {{-- <p><strong>Community:</strong> {{ $request->community_id ? $request->community->name : 'Tidak ada' }}</p> --}}
        </div>
    </div>

    <a href="{{ route('requests.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
