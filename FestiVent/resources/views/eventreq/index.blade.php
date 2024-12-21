@extends('eventreq.index')

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
                <a href="{{ route('eventreq.show', $event->id) }}">View Details</a>
                <a href="{{ route('eventreq.edit', $event->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
