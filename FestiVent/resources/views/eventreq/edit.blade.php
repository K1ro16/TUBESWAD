@extends('eventreq.index')

@section('title', 'Edit Event')

@section('content')
    <h1>Edit Event</h1>

    <form action="{{ route('eventreq.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nama_event">Event Name:</label>
        <input type="text" id="nama_event" name="nama_event" value="{{ $event->nama_event }}" required>

        <label for="deskripsi">Description:</label>
        <textarea id="deskripsi" name="deskripsi" required>{{ $event->deskripsi }}</textarea>

        <label for="poster">Poster:</label>
        <input type="file" id="poster" name="poster" accept="image/jpeg, image/png">
        @if($event->poster)
            <p>Current Poster:</p>
            <img src="{{ asset('storage/'.$event->poster) }}" alt="Poster" width="100">
        @endif

        <label for="lokasi">Location:</label>
        <textarea id="lokasi" name="lokasi" required>{{ $event->lokasi }}</textarea>

        <label for="tanggal">Date:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ $event->tanggal->toDateString() }}" required>

        <label for="waktu">Time:</label>
        <input type="datetime-local" id="waktu" name="waktu" value="{{ $event->waktu->format('Y-m-d\TH:i') }}" required>

        <label for="harga">Price:</label>
        <input type="number" id="harga" name="harga" value="{{ $event->harga }}" required>

        <label for="penyelenggara">Organizer:</label>
        <input type="text" id="penyelenggara" name="penyelenggara" value="{{ $event->penyelenggara }}" required>

        <button type="submit">Update Event</button>
    </form>
@endsection
