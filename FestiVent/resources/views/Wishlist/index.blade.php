<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wishlist - FestiVent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
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
</head>

<body>

  <header id="header" class="header d-flex align-items-center sticky-top mb-5">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('img/logo_app.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}">Home<br></a></li>

          <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
          <li><a href="{{ route('wishlist.index') }}"  class="active" ><i class="bi"></i> Wishlist</a></li>
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
  <!-- Header -->

  <!-- isi -->
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse($wishlist_items as $item)
        <div class="col">
          <div class="card h-100">
            @if($item->event->poster)
              <img src="{{ Storage::url($item->event->poster) }}" class="card-img-top" alt="{{ $item->event->nama_event }}">
            @else
              <img src="/api/placeholder/400/200" class="card-img-top" alt="No Image Available">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $item->event->nama_event }}</h5>
              <p class="card-text">{{ Str::limit($item->event->deskripsi, 100) }}</p>
              
              <div class="mb-3">
                <small class="text-muted">
                  <i class="bi bi-geo-alt"></i> {{ $item->event->lokasi }}<br>
                  <i class="bi bi-calendar"></i> {{ $item->event->tanggal }}<br>
                  <i class="bi bi-clock"></i> {{ $item->event->waktu }}<br>
                  <i class="bi bi-cash"></i> Rp {{ number_format($item->event->harga, 0, ',', '.') }}
                </small>
              </div>
              
              <form action="{{ route('wishlist.remove', $item->event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Remove from Wishlist
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-info text-center">
            Your wishlist is empty. Browse events to add some!
          </div>
        </div>
      @endforelse
    </div>
  </div>
  
  <footer id="footer" class="footer light-background mt-5">
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
        
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Pages</h4>
          <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="{{ route('feedback.index') }}">Feedback</a></li>
            <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
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
</body>

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