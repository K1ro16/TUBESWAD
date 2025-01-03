@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Menu, <span style="color: #000; font-weight: bold;">Add Community</span></h2>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
    <p>Community System Management</p>

    <!-- Form Tambah Komunitas -->
    <div class="card shadow-sm p-4 mb-5">
        <h4 class="mb-4" style="color: #000; font-weight: bold;">Community Data</h4>
        <form action="{{ route('communities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Nama Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Komunitas</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Komunitas" required>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="Music">Music</option>
                        <option value="Art">Art</option>
                        <option value="Sport">Sport</option>
                        <option value="Technology">Technology</option>
                        <option value="Communiy Gathering">Communiy Gathering</option>
                        <option value="Live Show">Live Show</option>
                        <option value="Festival">Festival</option>
                    </select>
                </div>

                <!-- Asal Kota -->
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Asal Kota</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Asal Kota" required>
                </div>

                <!-- Deskripsi Komunitas -->
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Deskripsi Komunitas</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Deskripsi Komunitas" required>
                </div>

                <!-- Gambar/Logo -->
                <div class="col-md-12 mb-3">
                    <label for="logo" class="form-label">Gambar/Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*" required>
                </div>
            </div>
            
            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <!-- List Community -->
    <div class="card shadow-sm p-4">
        <h4 class="mb-4" style="color: #000; font-weight: bold;">List of Communities</h4>
        <table class="table table-bordered">
            <thead>
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
                            <a href="{{ route('communities.edit', $community->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('communities.destroy', $community->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No communities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
