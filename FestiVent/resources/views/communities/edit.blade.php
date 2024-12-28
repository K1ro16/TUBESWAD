@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Menu, <span style="color: #000; font-weight: bold;">Edit Community</span></h2>
        <a href="{{ route('communities.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    <p>Community System Management</p>

    <!-- Form Edit Komunitas -->
    <div class="card shadow-sm p-4 mb-5">
        <h4 class="mb-4" style="color: #000; font-weight: bold;">Edit Community Data</h4>
        <form action="{{ route('communities.update', $community->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menambahkan method PUT karena ini adalah update -->

            <div class="row">
                <!-- Nama Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Komunitas</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $community->name) }}" required>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="Music" {{ $community->category == 'Music' ? 'selected' : '' }}>Music</option>
                        <option value="Art" {{ $community->category == 'Art' ? 'selected' : '' }}>Art</option>
                        <option value="Sport" {{ $community->category == 'Sport' ? 'selected' : '' }}>Sport</option>
                        <option value="Technology" {{ $community->category == 'Technology' ? 'selected' : '' }}>Technology</option>
                    </select>
                </div>

                <!-- Asal Kota -->
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Asal Kota</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $community->city) }}" required>
                </div>

                <!-- Deskripsi Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Deskripsi Komunitas</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $community->description) }}" required>
                </div>

                <!-- Gambar/Logo (Opsional) -->
                <div class="col-md-12 mb-3">
                    <label for="logo" class="form-label">Gambar/Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                    @if($community->image_path)
                        <img src="{{ asset('storage/' . $community->image_path) }}" alt="Logo" width="50" class="mt-2">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
