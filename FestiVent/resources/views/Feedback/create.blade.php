<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Feedback</title>
    
    <!-- Existing CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- New Enhanced Styles -->
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

    <!-- Keep existing header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <!-- Header content remains the same -->
    </header>

    <!-- Enhanced Feedback Section -->
    <div class="container-fluid px-4 py-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-light p-2 rounded-3 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="text-primary fw-bold mb-1">Share Your Feedback</h3>
                            <p class="text-muted mb-0">Help us improve your experience with your valuable feedback</p>
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
                <h4 class="mb-4 text-dark fw-bold">Feedback Form ✨</h4>
                <form action="{{ route('feedback.store') }}" method="POST">
                  @csrf
                  <div class="row g-4">
                      <div class="col-md-6">
                          <div class="form-floating">
                              <input type="text" name="nama" class="form-control" id="name" placeholder=" " required>
                              <label for="name">👤 Your Name</label>
                          </div>
                      </div>
              
                      <div class="col-md-6">
                          <div class="form-floating">
                              <input type="email" name="email" class="form-control" id="email" placeholder=" " required>
                              <label for="email">📧 Your Email</label>
                          </div>
                      </div>
              
                      <div class="col-12">
                          <div class="form-floating">
                              <textarea name="pesan" class="form-control" id="message" placeholder=" " style="height: 150px" required></textarea>
                              <label for="message">✍️ Your Message</label>
                          </div>
                      </div>
              
                      <!-- Rating select remains the same -->
                      <div class="col-md-6">
                        <select name="rating" class="form-select" required>
                            <option value="" disabled selected>Rate your experience</option>
                            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4">⭐⭐⭐⭐ Very Good</option>
                            <option value="3">⭐⭐⭐ Good</option>
                            <option value="2">⭐⭐ Fair</option>
                            <option value="1">⭐ Poor</option>
                        </select>
                    </div>
                      <!-- Rest of the form remains the same -->
                    <div class="col-12 text-end">
                      <button type="submit" class="submit-btn btn btn-primary rounded-pill">
                          <i class="bi bi-send me-2"></i> Send Feedback ✨
                      </button>
                    </div>
                  </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Keep existing footer -->
    <footer id="footer" class="footer light-background">
        <!-- Footer content remains the same -->
    </footer>

    <!-- Keep existing scripts -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>