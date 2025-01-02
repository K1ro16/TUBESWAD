<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Add animate.css -->
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
            background-color: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.2);
            transform: scale(1.01);
        }

        .form-floating {
            position: relative;
            margin-top: 1rem;
        }

        .form-floating > .form-control,
        .form-floating > .form-select {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }

        .form-floating > input[type="date"],
        .form-floating > input[type="time"] {
            padding: 1rem 0.75rem;
            min-height: calc(3.5rem + 2px);
        }

        .form-floating > input[type="date"]::-webkit-calendar-picker-indicator,
        .form-floating > input[type="time"]::-webkit-calendar-picker-indicator {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
            opacity: 0.7;
        }

        .form-floating > input[type="date"],
        .form-floating > input[type="time"] {
            position: relative;
            text-align: left;
        }

        /* Style for all floating labels */
        .form-floating > label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 0.25rem 0.75rem !important;
            height: auto !important;
            pointer-events: none;
            border: 1px solid transparent;
            transform: none !important;
            background: transparent;
            color: #666;
        }

        /* Override floating behavior for all inputs */
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select ~ label {
            opacity: 1;
            transform: none !important;
            padding: 0.25rem 0.75rem !important;
            background: transparent;
            z-index: 1;
            height: auto !important;
            margin-top: 0;
            color: #666;
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

        .file-upload {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .file-upload input[type=file] {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .floating-label {
            display: none;
        }

        .form-control, .form-select {
            background-color: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Style for select elements */
        .form-floating > .form-select {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }

        /* Ensure selected option text is positioned correctly */
        .form-floating > .form-select option {
            padding: 0.5rem;
        }

        /* Keep label at top when select has value */
        .form-floating > .form-select:not([value=""]):valid ~ label {
            opacity: 1;
            transform: none !important;
            padding: 0.25rem 0.75rem !important;
            background: transparent;
            z-index: 1;
            height: auto !important;
            margin-top: 0;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container-fluid px-4 py-5">
    <!-- Original Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-light p-2 rounded-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="text-primary fw-bold mb-1">Manage Your Event</h3>
                        <p class="text-muted mb-0 fs-8">Create and manage your events efficiently with our comprehensive system</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="mx-auto" style="max-width: 1200px;">
        <div class="fun-card shadow p-5 animate_animated animate_fadeInUp">
            <h4 class="mb-4 text-dark fw-bold">Event Data ✨</h4>

            <form action="{{ route('eventreq.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama_event" class="form-control" id="nama_event" placeholder="Event Name" required>
                            <label for="nama_event">✨ Event Name</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="category" class="form-select" id="category" required>
                                <option value="community gathering">Community Gathering</option>
                                <option value="sports">Sports</option>
                                <option value="live show">Live Show</option>
                                <option value="festival">Festival</option>
                                <option value="music">Music</option>
                            </select>
                            <label for="category">🎪 Event Type</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Location" required>
                            <label for="lokasi">📍 Location</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="penyelenggara" class="form-control" id="penyelenggara" placeholder="Organizer" required>
                            <label for="penyelenggara">👑 Organizer</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Description" style="height: 100px" required></textarea>
                            <label for="deskripsi">✏ Description</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="file-upload text-center">
                            <input type="file" name="poster" id="posterInput" class="form-control" accept="image/jpeg, image/png" onchange="document.getElementById('posterPreview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('posterPreview').style.display = 'block';">
                            <div class="text-center p-4 border-2 border-dashed rounded-3">
                                <i class="fas fa-image fa-2x text-primary"></i>
                                <p class="mt-2">📸 Drop your event poster here!</p>
                            </div>
                            <div class="preview-container mt-3">
                                <img id="posterPreview" src="#" alt="Poster Preview" style="max-width: 200px; max-height: 200px; margin: 0 auto; display: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Date" required>
                            <label for="tanggal">📅 Date</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="time" name="waktu" class="form-control" id="waktu" placeholder="Time" required>
                            <label for="waktu">⏰ Time</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="Price" required>
                            <label for="harga">💰 Price</label>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="submit-btn btn btn-primary rounded-pill">
                        <i class="fas fa-paper-plane me-2"></i> Create Event ✨
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
