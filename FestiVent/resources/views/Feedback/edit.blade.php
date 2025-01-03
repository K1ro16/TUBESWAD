<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Feedback</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  {{-- CSS Internal --}}
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
  </style>
</head>

<body class="index-page">
  {{-- Feedback Section --}}
  <div class="container-fluid px-4 py-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-light p-2 rounded-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="text-primary fw-bold mb-1">Edit Your Feedback</h3>
                        <p class="text-muted mb-0">Update your feedback to help us improve</p>
                    </div>
                    <a href="{{ route('feedback.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto" style="max-width: 1200px;">
        <div class="fun-card shadow p-5 animate__animated animate__fadeInUp">
            <h4 class="mb-4 text-dark fw-bold">Edit Feedback Form ✨</h4>
            <form action="{{ route('feedback.update',$feedback->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama" class="form-control" id="name" placeholder=" " value="{{ $feedback->nama }}" required>
                            <label for="name">👤 Your Name</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder=" " value="{{ $feedback->email }}" required>
                            <label for="email">📧 Your Email</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="pesan" class="form-control" id="message" placeholder=" " style="height: 150px" required>{{ $feedback->pesan }}</textarea>
                            <label for="message">✍️ Your Message</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <select name="rating" class="form-select" required>
                            <option value="" disabled>Rate your experience</option>
                            <option value="5" {{ $feedback->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4" {{ $feedback->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ Very Good</option>
                            <option value="3" {{ $feedback->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ Good</option>
                            <option value="2" {{ $feedback->rating == 2 ? 'selected' : '' }}>⭐⭐ Fair</option>
                            <option value="1" {{ $feedback->rating == 1 ? 'selected' : '' }}>⭐ Poor</option>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="submit-btn btn btn-primary rounded-pill">
                            <i class="bi bi-send me-2"></i> Update Feedback ✨
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

  <!-- JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <script src="{{ asset('js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>