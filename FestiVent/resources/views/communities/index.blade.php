@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Register Your Community</h2>
        <a href="{{ route('home') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
    <p class="text-muted">FestiVent - Community System Management</p>

    <!-- Form Tambah Komunitas -->
    <div class="card shadow p-4 mb-5 border-0 rounded">
        <h4 class="mb-4 text-dark fw-bold">Community Data</h4>
        <form action="{{ route('communities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Nama Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label text-muted">Nama Komunitas</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control rounded-3 @error('name') is-invalid @enderror" 
                        placeholder="Nama Komunitas" 
                        value="{{ old('name') }}" 
                        required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label text-muted">Kategori</label>
                    <select 
                        name="category" 
                        id="category" 
                        class="form-select rounded-3 @error('category') is-invalid @enderror" 
                        required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Music" {{ old('category') == 'Music' ? 'selected' : '' }}>Music</option>
                        <option value="Art" {{ old('category') == 'Art' ? 'selected' : '' }}>Art</option>
                        <option value="Sport" {{ old('category') == 'Sport' ? 'selected' : '' }}>Sport</option>
                        <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Asal Kota -->
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label text-muted">Asal Kota</label>
                    <input 
                        type="text" 
                        name="city" 
                        id="city" 
                        class="form-control rounded-3 @error('city') is-invalid @enderror" 
                        placeholder="Asal Kota" 
                        value="{{ old('city') }}" 
                        required>
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label text-muted">Deskripsi Komunitas</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control rounded-3 @error('description') is-invalid @enderror" 
                        rows="3" 
                        placeholder="Deskripsi Komunitas" 
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar/Logo -->
                <div class="col-md-12 mb-3">
                    <label for="logo" class="form-label text-muted">Gambar/Logo</label>
                    <input 
                        type="file" 
                        name="logo" 
                        id="logo" 
                        class="form-control rounded-3 @error('logo') is-invalid @enderror" 
                        accept="image/*">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
