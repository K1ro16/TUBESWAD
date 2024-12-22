@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Menu, Register Your Community</h2>
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
                    <input type="text" name="name" id="name" class="form-control rounded-3" placeholder="Nama Komunitas" required>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label text-muted">Kategori</label>
                    <select name="category" id="category" class="form-select rounded-3" required>
                        <option value="Music">Music</option>
                        <option value="Art">Art</option>
                        <option value="Sport">Sport</option>
                        <option value="Technology">Technology</option>
                    </select>
                </div>

                <!-- Asal Kota -->
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label text-muted">Asal Kota</label>
                    <input type="text" name="city" id="city" class="form-control rounded-3" placeholder="Asal Kota" required>
                </div>

                <!-- Deskripsi Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label text-muted">Deskripsi Komunitas</label>
                    <input type="text" name="description" id="description" class="form-control rounded-3" placeholder="Deskripsi Komunitas" required>
                </div>

                <!-- Gambar/Logo -->
                <div class="col-md-12 mb-3">
                    <label for="logo" class="form-label text-muted">Gambar/Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control rounded-3" accept="image/*" required>
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

    <!-- List of Communities -->
    <div class="card shadow p-4 border-0 rounded">
        <h4 class="mb-4 text-dark fw-bold">List of Communities</h4>
        <table class="table table-hover align-middle">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Nama Komunitas</th>
                    <th>Kategori</th>
                    <th>Asal Kota</th>
                    <th>Deskripsi</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($communities as $key => $community)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $community->name }}</td>
                        <td>{{ $community->category }}</td>
                        <td>{{ $community->city }}</td>
                        <td>{{ $community->description }}</td>
                        <td>
                            @if ($community->image_path)
                            <img src="{{ asset('storage/' . $community->image_path) }}" alt="Logo" width="50">
                            @else
                                No Image
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('communities.edit', $community->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('communities.destroy', $community->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No communities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
