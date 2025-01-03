<!-- resources/views/community/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ $community->name }}</h2>
            <p class="text-muted">{{ $community->category }} - {{ $community->city }}</p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ $community->image_path ? asset('storage/' . $community->image_path) : asset('default-logo.png') }}" 
                     alt="{{ $community->name }}" 
                     class="img-fluid" 
                     style="object-fit: cover; border-radius: 10px;">
            </div>

            <div class="col-md-6">
                <h4 class="fw-bold">Description</h4>
                <p>{{ $community->description }}</p>
            </div>
        </div>

        <!-- button balik ke list community -->
        <div class="text-center mt-4">
            <a href="{{ route('communities.index') }}" class="btn btn-secondary">Back to Communities</a>
        </div>
    </div>
@endsection
