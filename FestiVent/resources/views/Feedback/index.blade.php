<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Feedback</title>
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

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('img/logo_app.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}">Home<br></a></li>
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

        @if(session('account_id'))
            @if(session('community_id'))
                <a href="{{ route('eventreq.index') }}" class="btn-getstarted">Request Event</a>
            @else
                <a href="{{ route('communities.index') }}" class="btn-getstarted">Community Signup</a>
            @endif

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

  {{-- FEEDBACK CONTENT --}}

  <main id="main">

    <section id="feedback" class="feedback">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-between">
            <div class="col-4 section-header mb-2">
                <h2>Feedback</h2>
            </div>
            <div class="col-2 mb-2">
                {{-- Button for add feedback --}}
                <a href="{{ route('feedback.create') }}" class="btn btn-outline-primary w-100 float-end">Add Feedback</a>
            </div>
        </div>

        <div class="text-success mb-4">
            <hr>
        </div>

        <div class="row justify-content-around">
            {{-- show all feedback from database --}}
            @foreach ($feedbacks as $feedback)
            <div class="col-md-5 shadow p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-up" data-aos-delay="100">
                <div class="feedback-item p-4">
                    <div class="feedback-content">
                        <p>
                            {{-- Pesan --}}
                            <i class="bi bi-quote quote-icon-left"></i>
                            {{ $feedback->pesan }}
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        {{-- Rating --}}
                        <h5>ratings : {{ $feedback->rating }}/5</h5>
                    </div>
                    <div class="row justify-content-between mt-4">
                        <div class="col-10 feedback-profile">
                            {{-- Nama --}}
                            <h3 id="name">{{ $feedback->name }}</h3>
                            {{-- Email --}}
                            <h4 id="email">{{ $feedback->email }}</h4>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-md-5 shadow p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-up" data-aos-delay="100"> --}}
                {{-- <div class="feedback-item p-4"> --}}
                    {{-- <div class="feedback-content"> --}}
                        {{-- <p> --}}
                            {{-- Pesan --}}
                            {{-- <i class="bi bi-quote quote-icon-left"></i> --}}
                            {{-- Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. --}}
                            {{-- <i class="bi bi-quote quote-icon-right"></i> --}}
                        {{-- </p> --}}
                        {{-- Rating --}}
                        {{-- <h5>ratings : 4/5</h5> --}}
                    {{-- </div>
                    <div class="row justify-content-between mt-4">
                        <div class="col-10 feedback-profile">
                            {{-- Nama --}}
                            {{-- <h3 id="name">Saul Goodman</h3> --}}
                            {{-- Email --}}
                            {{-- <h4 id="email">saul@gmail.com</h4> --}}
                        {{-- </div>
                        <div class="col-2 action-delete">
                            <a href="#" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        </div>



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

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">OnePage</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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