@extends('eventreq.index')

@section('title', 'Create Event')

@section('content')
    <h1>Create Event</h1>

    <form action="{{ route('eventreq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama_event">Event Name:</label>
        <input type="text" id="nama_event" name="nama_event" required>

        <label for="deskripsi">Description:</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>

        <label for="poster">Poster:</label>
        <input type="file" id="poster" name="poster" accept="image/jpeg, image/png">

        <label for="lokasi">Location:</label>
        <textarea id="lokasi" name="lokasi" required></textarea>

        <label for="tanggal">Date:</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <label for="waktu">Time:</label>
        <input type="datetime-local" id="waktu" name="waktu" required>

        <label for="harga">Price:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="penyelenggara">Organizer:</label>
        <input type="text" id="penyelenggara" name="penyelenggara" required>

        <button type="submit">Create Event</button>
    </form>
@endsection
