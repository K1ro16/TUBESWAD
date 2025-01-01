<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FestiVent</title>
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
              <li><a href="#about">About Us</a></li>
              <li><a href="#contact">Contact Us</a></li>
              <li><a href="{{ route('feedback.index') }}">Feedback</a></li>
            </ul>
          </li>
          <li><a href="{{ route('wishlist.index') }}"><i class="bi bi-heart"></i> Wishlist</a></li>
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

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="{{ asset('img/hero-bg-abstract.jpg') }}" alt="" data-aos="fade-in" class="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-7 col-lg-9 text-center">
            <h1>FestiVent</h1>
            <p>Support Communities, Enliven Local Events, and Build More Meaningful Connections.</p>
          </div>
        </div>
        <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
          <a href="#services" class="btn-get-started">See More</a>
        </div>

        <!-- Card -->

        <div class="row row-cols-lg-5 gy-4 mt-5">
          <div class="col-md-2 col-md-3" data-aos="zoom-out" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-person-arms-up"></i></div>
              <h4 class="title"><a href="{{ route('category.show', 'Community Gathering') }}">Community Gathering</a></h4>
              <p class="description">A space for community meetups, from casual discussions to collaborative events, fostering connections and togetherness.</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-md-2 col-md-3" data-aos="zoom-out" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-person-walking"></i></div>
              <h4 class="title"><a href="{{ route('category.show', 'Sports') }}">Sports</a></h4>
              <p class="description">Celebrate the spirit of sports with tournaments, matches, and fitness activities that promote health and teamwork.</p>
            </div>
          </div>

          <div class="col-md-2 col-md-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-mic-fill"></i></div>
              <h4 class="title"><a href="{{ route('category.show', 'Live Show') }}">Live Show</a></h4>
              <p class="description">Experience the excitement of live performances, from art and comedy to inspiring shows and entertainment.</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-md-2 col-md-3" data-aos="zoom-out" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-music-note-beamed"></i></div>
              <h4 class="title"><a href="{{ route('category.show', 'Music') }}">Music</a></h4>
              <p class="description">Feel the rhythm and enjoy live music events, concerts, and festivals featuring local and international artists.</p>
            </div>
          </div><!--End Icon Box -->

          <div class="col-md-2 col-md-3" data-aos="zoom-out" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-fire"></i></div>
              <h4 class="title"><a href="{{ route('category.show', 'Festival') }}">Festival</a></h4>
              <p class="description">Discover vibrant festivals filled with culture, food, and entertainment for unforgettable experiences.</p>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
      <p>Festivent is a trusted ticketing platform for various events, including concerts, festivals, sports, and seminars. With an easy-to-use interface and secure transaction system, we make it simple for you to discover and purchase tickets for your special moments.
        We are committed to delivering the best service to ensure every event becomes an unforgettable experience. Festivent – find, buy, and enjoy the excitement of your favorite events!</p>
      <p><strong>Support Communities, Enliven Local Events, and Build More Meaningful Connections.</strong></p>
      </div><!-- End Section Title -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center gy-4">
          <div class="col-lg-3 col-md-6 d-flex justify-content-center">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>

              <p>Community</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex justify-content-center">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Events</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex justify-content-center">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Users</p>
            </div>
          </div><!-- End Stats Item -->

        </div>
      </div>
    </section>
    <!-- /Stats Section -->

    <!-- Services/Recommendation Section -->
    <section id="services" class="services section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Recommendation</h2>
            <p>Discover exciting events tailored just for you</p>

            <!-- Add Event Button (Only Visible After Login) -->
            @if(session('account_id'))
                <div class="mt-4 mb-3 align-items-center">
                    <a href="{{ route('eventreq.index') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Event
                    </a>
                </div>
            @endif
        </div>

        <!-- Swiper Container -->
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                    },
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 20
                        },
                        "768": {
                            "slidesPerView": 2,
                            "spaceBetween": 30
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 40
                        }
                    }
                }
            </script>

            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                @forelse($eventreqs as $eventreq)
                    <div class="swiper-slide">
                        <div class="card shadow border-0 rounded-lg p-4 hover-card">
                            <!-- Wishlist button -->
                            <div class="d-flex justify-content-end mb-2">
                                <form action="{{ route('wishlist.toggle', $eventreq->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="border-radius: 50%; width: 40px; height: 40px; padding: 0;">
                                        <i class="bi {{ in_array($eventreq->id, $wishlisted ?? []) ? 'bi-heart-fill' : 'bi-heart' }}" style="font-size: 20px;"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Event Image -->
                            <a href="{{ route('tabevent.show', $eventreq->id) }}" style="text-decoration: none; color: inherit;">
                                @if($eventreq->poster)
                                    <img src="{{ Storage::url($eventreq->poster) }}" 
                                         alt="{{ $eventreq->nama_event }}" 
                                         class="img-fluid rounded" 
                                         style="width: 100%; height: 200px; object-fit: cover; margin-bottom: 15px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                        <p class="text-muted">No Image Available</p>
                                    </div>
                                @endif
                            </a>

                            <!-- Event Details -->
                            <div class="text-center">
                                <h5 class="fw-bold text-primary">{{ $eventreq->nama_event }}</h5>
                                <p class="text-muted mb-1"><i class="bi bi-geo-alt"></i> {{ $eventreq->lokasi }}</p>
                                <p class="text-muted mb-1"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($eventreq->tanggal)->format('l, d F Y') }}</p>
                                <p class="text-muted mb-1"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($eventreq->waktu)->format('H:i') }} WIB</p>
                                <p class="text-muted"><i class="bi bi-cash"></i> Rp {{ number_format($eventreq->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('tabevent.show', $eventreq->id) }}" class="btn btn-primary mt-3">Learn More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide text-center">
                        <p class="text-muted">No events available. Please check back later!</p>
                    </div>
                @endforelse
            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Visual Separator -->
    <div style="height: 80px;"></div>

    <!-- Community Section -->
    <section id="community" class="section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Community</h2>
                <p class="text-muted">
                    The community feature on the Festivent platform allows users to connect, interact, 
                    and share their excitement with other event attendees, creating a more engaging and social ticketing experience.
                </p>
                <!-- Add Community Button (Only Visible After Login) -->
                @if(session('account_id'))
                    <div class="mt-4 mb-3 align-items-center">
                        <a href="{{ route('communities.index') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Community
                        </a>
                    </div>
                @endif
            </div>

            <!-- End Section Title -->
            </div>

            <!-- Swiper Container -->
            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                  },
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 20
                    },
                    "768": {
                      "slidesPerView": 2,
                      "spaceBetween": 30
                    },
                    "1200": {
                      "slidesPerView": 3,
                      "spaceBetween": 40
                    }
                  }
                }
              </script>

              <!-- Swiper Wrapper -->
              <div class="swiper-wrapper">
                @forelse($communities as $community)
                  <div class="swiper-slide">
                    <div class="community-item">
                      <div class="card shadow border-0 rounded-lg p-4 hover-card">
                        <!-- Community Image -->
                        <img src="{{ $community->image_path ? asset('storage/' . $community->image_path) : asset('default-logo.png') }}" 
                            alt="{{ $community->name }}" 
                            class="community-image mx-auto mb-3" 
                            style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">

                        <!-- Community Details -->
                        <div class="card-body text-center">
                          <h5 class="fw-bold text-primary">{{ $community->name }}</h5>
                          <p class="text-muted mb-1"><strong>Category:</strong> {{ $community->category }}</p>
                          <p class="text-muted"><strong>City:</strong> {{ $community->city }}</p>
                          <button class="btn btn-primary mt-3" 
                            onclick="showPopup(
                                '{{ addslashes($community->name) }}', 
                                '{{ addslashes($community->category) }}', 
                                '{{ addslashes($community->city) }}', 
                                '{{ addslashes($community->description) }}', 
                                '{{ $community->image_path ? asset('storage/' . $community->image_path) : asset('default-logo.png') }}'
                            )">
                            Learn More
                        </button>

                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="swiper-slide text-center">
                    <p class="text-muted">No communities available. Please check back later!</p>
                  </div>
                @endforelse
              </div>

              <!-- Navigation Arrows -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <!-- Pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </section>

    <!-- Popup Modal -->
    <div id="community-popup" class="popup-modal" style="display: none;">
      <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <img id="popup-image" src="" alt="Community Image" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
        <h3 id="popup-name" class="fw-bold text-primary"></h3>
        <p id="popup-category" class="text-muted"><strong>Category:</strong> </p>
        <p id="popup-city" class="text-muted"><strong>City:</strong> </p>
        <p id="popup-description" class="text-muted"></p>
      </div>
    </div>

    <style>
      /* Popup Modal Styling */
      .popup-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
      }

      .popup-content {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        width: 90%;
        max-width: 500px;
        position: relative;
      }

      .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        cursor: pointer;
      }
    </style>

    <script>
      function showPopup(name, category, city, description, imagePath) {
        const popup = document.getElementById('community-popup');
        document.getElementById('popup-name').innerText = name;
        document.getElementById('popup-category').innerText = `Category: ${category}`;
        document.getElementById('popup-city').innerText = `City: ${city}`;
        document.getElementById('popup-description').innerText = description;
        document.getElementById('popup-image').src = imagePath;
        popup.style.display = 'flex';
      }

      function closePopup() {
        const popup = document.getElementById('community-popup');
        popup.style.display = 'none';
      }
    </script>
    
<!-- /Community Section -->
    <!-- Feedback Section -->
    <section id="call-to-action" class="call-to-action section accent-background">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Send Us a Message</h3>
              <p>"We value your thoughts and feedback because they help us grow and improve – take a moment to send us a message and let your voice be heard!"</p>
              <a class="cta-btn" href="{{ route('feedback.index') }}">See Feedbacks</a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- Feedback Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>How do I buy tickets on FestiVent?</h3>
                <div class="faq-content">
                  <p>Simply search for the event you want to attend, choose the ticket you want, and proceed to payment</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Can I cancel tickets that I've already purchased?</h3>
                <div class="faq-content">
                  <p>Tickets on Festivent cannot be canceled once purchased due to the policies set by event organizers</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>What payment methods are available on FestiVent?</h3>
                <div class="faq-content">
                  <p>We accept various payment methods including credit cards, bank transfers, and digital wallets</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>What should I do if I haven’t received my ticket after a successful payment?</h3>
                <div class="faq-content">
                  <p>If you haven't received your ticket, please check your spam folder or contact our customer support team.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Do i need to print my ticket?</h3>
                <div class="faq-content">
                  <p>Most events accept digital tickets. Simply show your ticket from the email or Festivent app when entering the event.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Are there any discount or special promotions?</h3>
                <div class="faq-content">
                  <p>Festivent offers various promotions and discounts from time to time. Be sure to follow us on social media for the latest updates.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.304493095284!2d107.62777107628614!3d-6.973357268285083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sUniversitas%20Telkom!5e0!3m2!1sid!2sid!4v1734595123265!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container text-center">
          <div class="row">
            <div class="col">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-telephone flex-shrink-0"></i>
                  <div>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                  </div>
              </div>
            </div>
            <div class="col">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

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
      <p><strong class="px-1 sitename">FestiVent</strong> <span>Project</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="#">Manprosi X WAD</a>
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
