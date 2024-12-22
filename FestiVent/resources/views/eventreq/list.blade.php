@extends('eventreq.base')

@section('title', 'Event List')

@section('content')
    <h1>Event List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach($events as $event)
            <li>
                <strong>{{ $event->nama_event }}</strong>
                <p>{{ $event->deskripsi }}</p>
                @if($event->poster)
                    <img src="{{ asset('storage/'.$event->poster) }}" alt="Poster" width="100">
                @endif
                <p><strong>Location:</strong> {{ $event->lokasi }}</p>
                <p><strong>Time:</strong> {{ $event->waktu }}</p>
                <p><strong>Price:</strong> {{ $event->harga }}</p>
                <p><strong>Organizer:</strong> {{ $event->penyelenggara }}</p>
                <a href="{{ route('eventreq.show', $event->id) }}">View Details</a>
                <a href="{{ route('eventreq.edit', $event->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
