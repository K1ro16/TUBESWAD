<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .fun-card {
            background: white;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .fun-card:hover {
            transform: translateY(-5px);
        }

        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.2);
            transform: scale(1.01);
        }

        .floating-label {
            position: absolute;
            pointer-events: none;
            left: 24px;
            top: 12px;
            transition: 0.2s ease all;
            color: #6c757d;
        }

        .form-control:focus ~ .floating-label,
        .form-control:not(:placeholder-shown) ~ .floating-label {
            transform: translateY(-20px) scale(0.8);
            color: #0d6efd;
            background: white;
            padding: 0 5px;
        }

        .submit-btn {
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .preview-card {
            transition: all 0.3s ease;
            background: #fff;
        }

        .preview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .event-details {
            font-size: 0.9rem;
        }

        .badge {
            font-weight: normal;
            letter-spacing: 0.5px;
        }

        .alert-info {
            background-color: #f8f9fa;
            border-left: 4px solid #0dcaf0;
        }

        .progress {
            border-radius: 0.5rem;
            background-color: #e9ecef;
        }

        .progress-bar {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<div class="container-fluid px-4 py-5">
    <!-- Status Bar / Indikator Progres -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="progress" style="height: 4px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <span class="badge bg-success">Basic Info ✓</span>
                <span class="badge bg-success">Details ✓</span>
                <span class="badge bg-success">Media ✓</span>
                <span class="badge bg-primary">Final Review</span>
            </div>
        </div>
    </div>

    <!-- Bagian Tips Cepat -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info border-0 shadow-sm">
                <h6 class="alert-heading"><i class="fas fa-lightbulb"></i> Quick Tips</h6>
                <ul class="mb-0 small">
                    <li>Use high-quality images for better visibility</li>
                    <li>Be specific with your event location</li>
                    <li>Add clear pricing information</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Formulir Utama dengan Tata Letak Dua Kolom -->
    <div class="row">
        <!-- Kolom Formulir -->
        <div class="col-lg-8">
            <div class="fun-card shadow p-5 animate__animated animate__fadeInUp">
                <h4 class="mb-4 text-dark fw-bold">Event Data ✨</h4>

                <form action="{{ route('eventreq.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-6 position-relative">
                            <input type="text" name="nama_event" class="form-control" placeholder=" " value="{{ old('nama_event', $event->nama_event) }}" required>
                            <span class="floating-label">✨ Event Name</span>
                        </div>

                        <div class="col-md-6">
                            <select name="category" class="form-select" required>
                                <option value="">Select Event Type</option>
                                @foreach(['community gathering' => '👥 Community Gathering',
                                        'sports' => '⚽ Sports',
                                        'live show' => '🎭 Live Show',
                                        'festival' => '🎪 Festival',
                                        'music' => '🎵 Music'] as $value => $label)
                                    <option value="{{ $value }}" {{ old('category', $event->category) == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 position-relative">
                            <input type="text" name="lokasi" class="form-control" placeholder=" " value="{{ old('lokasi', $event->lokasi) }}" required>
                            <span class="floating-label">📍 Location</span>
                        </div>

                        <div class="col-md-6 position-relative">
                            <input type="text" name="penyelenggara" class="form-control" placeholder=" " value="{{ old('penyelenggara', $event->penyelenggara) }}" required>
                            <span class="floating-label">👑 Organizer</span>
                        </div>

                        <div class="col-12 position-relative">
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder=" " required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                            <span class="floating-label">✏ Description</span>
                        </div>

                        <div class="col-12">
                            <div class="text-center p-4 border-2 border-dashed rounded-3">
                                @if($event->poster)
                                    <img src="{{ asset('storage/'.$event->poster) }}" alt="Current Poster" class="img-fluid mb-3" style="max-height: 200px; border-radius: 10px;">
                                @endif
                                <input type="file" name="poster" class="form-control" accept="image/jpeg, image/png">
                                <p class="text-muted mt-2">📸 Upload new poster (optional)</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d', strtotime($event->tanggal))) }}" required>
                        </div>

                        <div class="col-md-4">
                            <input type="time" name="waktu" class="form-control" value="{{ old('waktu', date('H:i', strtotime($event->waktu))) }}" required>
                        </div>

                        <div class="col-md-4 position-relative">
                            <input type="number" name="harga" class="form-control" placeholder=" " value="{{ old('harga', $event->harga) }}" required>
                            <span class="floating-label">💰 Price</span>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="submit-btn btn btn-primary rounded-pill">
                            <i class="fas fa-save me-2"></i> Update Event ✨
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="fun-card shadow p-4 animate__animated animate__fadeInRight">
                <h5 class="text-center mb-4">Current Event Preview</h5>
                <div class="preview-card border rounded-3 p-3 mb-4">
                    @if($event->poster)
                        <img src="{{ asset('storage/'.$event->poster) }}"
                             class="img-fluid rounded-3 mb-3"
                             alt="Event Poster">
                    @endif

                    <div class="event-details">
                        <h6 class="text-primary mb-2">{{ $event->nama_event }}</h6>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <span class="small">{{ $event->lokasi }}</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar text-info me-2"></i>
                            <span class="small">{{ date('d M Y', strtotime($event->tanggal)) }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tag text-success me-2"></i>
                            <span class="small">Rp {{ number_format($event->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Label Kategori -->
                <div class="text-center mb-4">
                    <span class="badge bg-primary px-3 py-2">
                        @switch($event->category)
                            @case('community gathering')
                                👥 Community Gathering
                                @break
                            @case('sports')
                                ⚽ Sports
                                @break
                            @case('live show')
                                🎭 Live Show
                                @break
                            @case('festival')
                                🎪 Festival
                                @break
                            @case('music')
                                🎵 Music
                                @break
                            @default
                                📌 {{ ucfirst($event->category) }}
                        @endswitch
                    </span>
                </div>

                <!-- Aksi Cepat -->
                <div class="d-grid gap-2">
                    <button type="button"
                            class="btn btn-outline-danger btn-sm"
                            onclick="document.getElementById('deleteForm').submit();">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-trash-alt me-2"></i>
                            <span>Delete Event</span>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Formulir Hapus Tersembunyi -->
<form id="deleteForm" action="{{ route('eventreq.destroy', $event->id) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
