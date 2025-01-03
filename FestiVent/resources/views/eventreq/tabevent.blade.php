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

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('img/logo_app.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}">Home<br></a></li>
          <li class="dropdown"><a href="#" class="active"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('category.show', 'Community Gathering') }}">Community Gathering</a></li>
              <li><a href="{{ route('category.show', 'Sports') }}">Sports</a></li>
              <li><a href="{{ route('category.show', 'Live Show') }}">Live Show</a></li>
              <li><a href="{{ route('category.show', 'Festival') }}">Festival</a></li>
              <li><a href="{{ route('category.show', 'Music') }}">Music</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{ route('home') }}"><span>Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('home') }}">About Us</a></li>
              <li><a href="{{ route('home') }}">Contact Us</a></li>
              <li><a href="{{ route('feedback.index') }}">Feedback</a></li>
            </ul>
          </li>
          <li><a href="{{ route('wishlist.index') }}"><i class="bi"></i> Wishlist</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

        @if(session('account_id'))
            <form action="{{ route('accounts.logout') }}" method="POST" style="display: inline; margin-left: 20px;">
                @csrf
                <button type="submit" class="btn-icon">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        @else
            <a href="{{ route('signin') }}" class="btn-getstarted">Login</a>
        @endif


    </div>
  </header>

  <div style="margin-top: 50px;"></div>

  <style>
    /* Hero Event Image */
    .event-hero {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 20px;
        margin-top: 80px;
    }

    .event-hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .event-hero:hover img {
        transform: scale(1.05);
    }

    /* card detail */
    .event-details-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .event-details-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: #2196F3;
    }

    /*  Title */
    .event-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2196F3;
        margin-bottom: 1.5rem;
    }

    /* meta info Icons */
    .meta-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        margin-bottom: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .meta-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .meta-info i {
        font-size: 1.5rem;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #f8f9fa;
    }

    /* Price Card */
    .price-card {
        background: #2196F3;
        border-radius: 16px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .price-label {
        font-size: 0.9rem;
        opacity: 0.9;
        font-weight: 500;
        letter-spacing: 0.5px;
        color: rgba(255, 255, 255, 0.9);
    }

    .price-amount {
        font-size: 2rem;
        font-weight: 700;
        margin: 0.5rem 0;
        display: flex;
        align-items: baseline;
        gap: 4px;
        color: #ffffff;
    }

    .price-amount::before {
        font-size: 1.5rem;
        font-weight: 600;
        opacity: 0.9;
        color: #ffffff;
    }

    /* Buy Button */
    .btn-buy {
        background: white;
        color: #2196F3;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-buy:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(33, 150, 243, 0.2);
        background: #f8f9fa;
    }

    /* Deskripsi */
    .description-section {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #2196F3;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 24px;
        background: #2196F3;
        border-radius: 4px;
    }

    /* Organizer Card */
    .organizer-card {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .organizer-icon {
        width: 60px;
        height: 60px;
        background: #2196F3;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .organizer-info h5 {
        margin: 0;
        font-weight: 600;
        color: #2196F3;
    }

    .organizer-info p {
        margin: 0;
        color: #6b7280;
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .event-hero {
            height: 300px;
        }

        .event-title {
            font-size: 2rem;
        }

        .price-amount {
            font-size: 1.5rem;
        }
    }
</style>


<div class="container mt-5">
    <div class="event-hero">
        @if($event->poster)
            <img src="{{ Storage::url($event->poster) }}" alt="{{ $event->nama_event }}">
        @else
            <div class="no-image">No Image Available</div>
        @endif
    </div>

    <div class="event-details-card mt-4">
        <h1 class="event-title">{{ $event->nama_event }}</h1>

        <div class="meta-info">
            <i class="bi bi-geo-alt-fill text-danger"></i>
            <span>{{ $event->lokasi }}</span>
        </div>

        <div class="meta-info">
            <i class="bi bi-calendar-event text-primary"></i>
            <span>{{ \Carbon\Carbon::parse($event->tanggal)->format('l, d F Y') }}</span>
        </div>

        <div class="meta-info">
            <i class="bi bi-clock text-success"></i>
            <span>{{ \Carbon\Carbon::parse($event->waktu)->format('H:i') }} WIB</span>
        </div>

        <div class="price-card mt-4">
            <p class="price-label">Starting from</p>
            <h3 class="price-amount">Rp {{ number_format($event->harga, 0, ',', '.') }}</h3>
            <a href="{{ route('payment.index', $event->id) }}" class="btn btn-buy">
                Buy Ticket
            </a>
        </div>

        <div class="description-section">
            <h4 class="section-title">About This Event</h4>
            <p class="text-muted">{{ $event->deskripsi }}</p>
        </div>

        <div class="organizer-card">
            <div class="organizer-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="organizer-info">
                <h5>{{ $event->penyelenggara }}</h5>
                <p>Event Organizer</p>
            </div>
        </div>
    </div>
</div>

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
