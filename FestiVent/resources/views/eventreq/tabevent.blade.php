<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - OnePage Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('img/logo_app.png') }}" alt="">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Community Gathering</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Live Show</a></li>
              <li><a href="#">Festival</a></li>
              <li><a href="#">Music</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </li>
          <li><a href="#team">Wishlist</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="{{ route('signin') }}" class="btn-getstarted" href="#about">Login</a>

    </div>
  </header>

  <div style="margin-top: 50px;"></div>

  <div class="container mt-5 py-5">
    <div class="row">
      <!-- Left Column - Poster -->
      <div class="col-md-5">
        <div style="top: 100px; height: fit-content;">
          @if($event->poster)
            <img src="{{ Storage::url($event->poster) }}" 
                 alt="{{ $event->nama_event }}" 
                 class="img-fluid rounded shadow-sm" 
                 style="width: 100%; max-height: calc(100vh - 200px); object-fit: contain;">
          @else
            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
              <p class="text-muted">No Image Available</p>
            </div>
          @endif
        </div>
      </div>

      <!-- Right Column - Event Details -->
      <div class="col-md-7">
        <!-- Event Title -->
        <h2 class="mb-4">{{ $event->nama_event }}</h2>

        <!-- Event Meta Information -->
        <div class="mb-4">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
            <span>{{ $event->lokasi }}</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-calendar-event text-primary me-2"></i>
            <span>{{ \Carbon\Carbon::parse($event->tanggal)->format('l, d F Y') }}</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-clock text-success me-2"></i>
            <span>{{ \Carbon\Carbon::parse($event->waktu)->format('H:i') }} WIB</span>
          </div>
        </div>

        <!-- Price and Action Button -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <p class="text-muted mb-0">Starting from</p>
                <h3 class="mb-0">Rp {{ number_format($event->harga, 0, ',', '.') }}</h3>
              </div>
              <button class="btn btn-primary px-4 py-2">
                Get Tickets
                <i class="bi bi-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Event Description -->
        <div class="mb-4">
          <h4 class="mb-3">About This Event</h4>
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <p class="text-muted mb-0">{{ $event->deskripsi }}</p>
            </div>
          </div>
        </div>

        <!-- Event Organizer -->
        <div class="mb-4">
          <h4 class="mb-3">Event Organizer</h4>
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" 
                     style="width: 50px; height: 50px;">
                  <i class="bi bi-building text-primary"></i>
                </div>
                <div>
                  <h5 class="mb-1">{{ $event->penyelenggara }}</h5>
                  <p class="text-muted mb-0">Event Organizer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ... existing footer ... -->
  <div style="margin-top: 55px;"></div>

<footer id="footer" class="footer light-background">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-about">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo_app.png') }}" style="width: 130px; height: 180px;">
      </a>
      <p>Support Communities, Enliven Local Events, and Build More Meaningful Connections.</p>
      <div class="social-links d-flex mt-4">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Terms of service</a></li>
        <li><a href="#">Privacy policy</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Product Management</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Graphic Design</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>Contact Us</h4>
      <p>A108 Adam Street</p>
      <p>New York, NY 535022</p>
      <p>United States</p>
      <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
      <p><strong>Email:</strong> <span>info@example.com</span></p>
    </div>

  </div>
</div>

</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
