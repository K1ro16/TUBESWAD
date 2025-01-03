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
          <li class="dropdown"><a href="{{ route('home') }}" class="active"><span>Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
  {{-- FEEDBACK CONTENT --}}

  <main id="main">
    <section id="feedback" class="feedback">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-6">
                    <div class="section-header">
                        <h2>Community Feedback</h2>
                        <p class="text-muted">See what others are saying about our events</p>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('feedback.print') }}" class="btn btn-add-feedback">
                        <i class="bi bi-printer me-2"></i>Print Feedback
                    </a>
                    <a href="{{ route('feedback.create') }}" class="btn btn-add-feedback">
                        <i class="bi bi-plus-circle me-2"></i>Add Feedback
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($feedbacks as $feedback)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feedback-item shadow-sm">
                        <div class="feedback-content">
                            <p class="mb-4">
                                <i class="bi bi-quote quote-icon-left"></i>
                                {{ $feedback->pesan }}
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            
                            @if($feedback->reply)
                                <div class="reply-content mb-3">
                                    <h5 class="reply-header">Reply:</h5>
                                    <p class="reply-text">{{ $feedback->reply }}</p>
                                    <small class="text-muted">
                                        Replied on: {{ $feedback->replied_at ? \Carbon\Carbon::parse($feedback->replied_at)->format('d M Y, H:i') : '' }}
                                    </small>
                                </div>
                            @endif

                            <div class="rating mb-3">
                                @for($i = 0; $i < $feedback->rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                @for($i = $feedback->rating; $i < 5; $i++)
                                    <i class="bi bi-star"></i>
                                @endfor
                            </div>
                            
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="feedback-profile">
                                        <h3>{{ $feedback->nama }}</h3>
                                        <h4>{{ $feedback->email }}</h4>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <button class="btn btn-action btn-reply border border-secondary" data-bs-toggle="modal" data-bs-target="#replyModal{{ $feedback->id }}">
                                        <i class="bi bi-reply"></i>
                                    </button>
                                    <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-action btn-edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
  </main>


  <footer id="footer" class="footer light-background mt-5">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo_app.png') }}" style="width: 130px; height: 180px;">
          </a>
          <p>Support Communities, Enliven Local Events, and Build More Meaningful Connections.</p>
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

  <!-- Reply Modals -->
  @foreach ($feedbacks as $feedback)
  <div class="modal fade" id="replyModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $feedback->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replyModalLabel{{ $feedback->id }}">Reply to {{ $feedback->nama }}'s Feedback</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('feedback.reply', $feedback->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="modal-body">
            <div class="mb-3">
              <label for="reply" class="form-label">Your Reply</label>
              <textarea class="form-control" id="reply" name="reply" rows="3" required>{{ $feedback->reply }}</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit Reply</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

</body>

</html>