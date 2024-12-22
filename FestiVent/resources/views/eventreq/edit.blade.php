<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - FestiVent</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Edit Event</h2>
        <a href="{{ route('eventreq.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <p class="text-muted">FestiVent - Event Management System</p>

    <!-- Edit Form -->
    <div class="card shadow p-4 border-0 rounded">
        <h4 class="mb-4 text-dark fw-bold">Event Data</h4>
        <form action="{{ route('eventreq.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Event Name -->
                <div class="col-md-6 mb-3">
                    <label for="nama_event" class="form-label text-muted">Event Name:</label>
                    <input type="text" name="nama_event" id="nama_event" class="form-control rounded-3" value="{{ old('nama_event', $event->nama_event) }}" required>
                </div>

                <!-- Category -->
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label text-muted">Category:</label>
                    <select name="category" id="category" class="form-select rounded-3" required>
                        @foreach(['community gathering', 'sports', 'live show', 'festival', 'music'] as $category)
                            <option value="{{ $category }}" {{ old('category', $event->category) == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Location -->
                <div class="col-md-6 mb-3">
                    <label for="lokasi" class="form-label text-muted">Location:</label>
                    <textarea name="lokasi" id="lokasi" class="form-control rounded-3" required>{{ old('lokasi', $event->lokasi) }}</textarea>
                </div>

                <!-- Description -->
                <div class="col-md-6 mb-3">
                    <label for="deskripsi" class="form-label text-muted">Description:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                </div>

                <!-- Current Poster -->
                <div class="col-md-12 mb-3">
                    <label class="form-label text-muted">Current Poster:</label>
                    <div class="mb-2">
                        @if($event->poster)
                            <img src="{{ asset('storage/'.$event->poster) }}" alt="Current Poster" class="img-thumbnail" style="max-height: 150px;">
                        @else
                            <p class="text-muted">No poster uploaded</p>
                        @endif
                    </div>
                </div>

                <!-- New Poster Upload -->
                <div class="col-md-12 mb-3">
                    <label for="poster" class="form-label text-muted">Upload New Poster:</label>
                    <input type="file" name="poster" id="poster" class="form-control rounded-3" accept="image/jpeg, image/png">
                    <small class="text-muted">Leave empty to keep current poster</small>
                </div>

                <!-- Date -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label text-muted">Date:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control rounded-3" value="{{ old('tanggal', date('Y-m-d', strtotime($event->tanggal))) }}" required>
                </div>

                <!-- Time -->
                <div class="col-md-6 mb-3">
                    <label for="waktu" class="form-label text-muted">Time:</label>
                    <input type="time" name="waktu" id="waktu" class="form-control rounded-3" value="{{ old('waktu', date('H:i', strtotime($event->waktu))) }}" required>
                </div>

                <!-- Price -->
                <div class="col-md-6 mb-3">
                    <label for="harga" class="form-label text-muted">Price:</label>
                    <input type="number" name="harga" id="harga" class="form-control rounded-3" value="{{ old('harga', $event->harga) }}" required>
                </div>

                <!-- Organizer -->
                <div class="col-md-6 mb-3">
                    <label for="penyelenggara" class="form-label text-muted">Organizer:</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" class="form-control rounded-3" value="{{ old('penyelenggara', $event->penyelenggara) }}" required>
                </div>
            </div>

            <!-- Save Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
