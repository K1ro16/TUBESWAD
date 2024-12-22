@extends('eventreq.index')

@section('title', 'Event Details')

@section('content')
    <h1>{{ $event->nama_event }}</h1>

    <p><strong>Description:</strong> {{ $event->deskripsi }}</p>

    @if($event->poster)
        <p><strong>Poster:</strong></p>
        <img src="{{ asset('storage/'.$event->poster) }}" alt="Poster" width="200">
    @endif

    <p><strong>Location:</strong> {{ $event->lokasi }}</p>
    <p><strong>Date:</strong> {{ $event->tanggal->toDateString() }}</p>
    <p><strong>Time:</strong> {{ $event->waktu->format('Y-m-d H:i') }}</p>
    <p><strong>Price:</strong> {{ $event->harga }}</p>
    <p><strong>Organizer:</strong> {{ $event->penyelenggara }}</p>

    <a href="{{ route('eventreq.edit', $event->id) }}">Edit Event</a>
    <form action="{{ route('eventreq.destroy', $event->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
    </form>
@endsection
