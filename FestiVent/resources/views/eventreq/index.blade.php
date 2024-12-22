<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Container for main content -->
<div class="container-fluid px-4 mt-5">

    <!-- Header Section - Made larger -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="bg-light p-4 rounded-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="text-primary fw-bold mb-2">Manage Your Event</h1>
                        <p class="text-muted fs-5 mb-0">FestiVent - Event Management System</p>
                        <p class="text-muted mb-0">Create and manage your events efficiently with our comprehensive system</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Form for Adding Event - Made smaller -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4 border-0 rounded">
                <h4 class="mb-3 text-dark fw-bold">Event Data</h4>
                <form action="{{ route('eventreq.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="nama_event" class="form-label text-muted small">Event Name:</label>
                            <input type="text" name="nama_event" id="nama_event" class="form-control form-control-sm" placeholder="Enter event name" required>
                        </div>

                        <div class="col-12">
                            <label for="category" class="form-label text-muted small">Category:</label>
                            <select name="category" id="category" class="form-select form-select-sm" required>
                                <option value="">Select a Category</option>
                                <option value="community gathering">Community Gathering</option>
                                <option value="sports">Sports</option>
                                <option value="live show">Live Show</option>
                                <option value="festival">Festival</option>
                                <option value="music">Music</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="lokasi" class="form-label text-muted small">Location:</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12">
                            <label for="deskripsi" class="form-label text-muted small">Description:</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control form-control-sm" rows="2" required></textarea>
                        </div>

                        <div class="col-12">
                            <label for="poster" class="form-label text-muted small">Poster:</label>
                            <input type="file" name="poster" id="poster" class="form-control form-control-sm" accept="image/jpeg, image/png">
                        </div>

                        <div class="col-6">
                            <label for="tanggal" class="form-label text-muted small">Date:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-6">
                            <label for="waktu" class="form-label text-muted small">Time:</label>
                            <input type="time" name="waktu" id="waktu" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-6">
                            <label for="harga" class="form-label text-muted small">Price:</label>
                            <input type="number" name="harga" id="harga" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-6">
                            <label for="penyelenggara" class="form-label text-muted small">Organizer:</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control form-control-sm" required>
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-sm px-4 rounded-pill">
                            <i class="fas fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- List of Events - Made larger -->
        <div class="col-md-8">
            <div class="card shadow-sm p-3 border-0 rounded">
                <h4 class="mb-4 text-dark fw-bold">List of Events</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Organizer</th>
                                <th>Poster</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $key => $event)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $event->nama_event }}</td>
                                    <td>{{ $event->category }}</td>
                                    <td>{{ $event->lokasi }}</td>
                                    <td>{{ $event->deskripsi }}</td>
                                    <td>{{ date('d M Y', strtotime($event->tanggal)) }}</td>
                                    <td>{{ date('H:i', strtotime($event->waktu)) }}</td>
                                    <td>Rp. {{ number_format($event->harga, 0, ',', '.') }}</td>
                                    <td>{{ $event->penyelenggara }}</td>
                                    <td>
                                        @if ($event->poster)
                                            <img src="{{ asset('storage/' . $event->poster) }}" alt="Poster" width="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('eventreq.edit', $event->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('eventreq.destroy', $event->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center text-muted">No events found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
