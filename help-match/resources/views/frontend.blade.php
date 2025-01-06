<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Help Match</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('frontend/assets/img/helpmatch.JPG') }}" rel="icon">
  <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
</head>


<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <h1 class="sitename">HelpMatch</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#features">Fitur</a></li>
        <li><a href="#contactUs">Hubungi Kami</a></li>
        <a href="{{ route('login') }}"><button type="button" class="btn btn-light">Login</button></a>
        <a href="{{ route('register') }}"><button type="button" class="btn btn-primary">Register</button></a>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>


  <main class="main">

    <!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <img src="{{ asset('frontend/assets/img/hero-bg-2.jpg') }}" alt="" class="hero-bg">

  <div class="container">
    <div class="row gy-4 justify-content-between">
      <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
        <img src="{{ asset('frontend/assets/img/video-call.png') }}" class="img-fluid animated" alt="">
      </div>

      <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
        <h1>Tidak Ada yang Tertinggal, <span>Semua Terhubung</span></h1>
        <p>Kami akan senantiasa menunggu panggilanmu.</p>
        <div class="d-flex">
          <a href="#about" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </div>
  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3"></use>
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0"></use>
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9"></use>
    </g>
  </svg>

</section><!-- /Hero Section -->


    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Tidak Ada yang Tertinggal, Semua Terhubung</h2>
            <p>Dalam dunia yang semakin cepat, HelpMatch hadir untuk memastikan tidak ada yang tertinggal. Kami menghubungkan Anda dengan para penyedia jasa yang berkompeten dan peduli. Baik Anda membutuhkan bantuan untuk aktivitas sehari-hari atau mencari teman berbagi cerita, kami siap membantu. Dengan HelpMatch, Anda tidak sendirian.</p>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Aksesibilitas</h3>
                  <p>Meningkatkan aksesibilitas terhadap layanan bantuan keseharian untuk lansia dan penyandang disabilitas.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Jasa Bantuan</h3>
                  <p>Memudahkan orang yang membutuhkan bantuan untuk menemukan penyedia jasa yang sesuai.
                  </p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>peluang pekerjaan</h3>
                  <p>Membuka peluang pekerjaan bagi individu yang ingin menjadi penyedia jasa dalam membantu orang lain.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Kapanpun, Dimanapun</h3>
                  <p>Selalu siap 24 jam ketika anda membutuhkan bantuan Kapanpun dan Dimanapun.</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
<section id="stats" class="stats section light-background">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="bi bi-emoji-smile"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="540" data-purecounter-duration="1" class="purecounter"></span>
        <p>Pelanggan</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="bi bi-journal-richtext"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="921" data-purecounter-duration="1" class="purecounter"></span>
        <p>Pesanan</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="bi bi-headset"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter"></span>
        <p>Tim Support</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="bi bi-people"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
        <p>Pekerja</p>
      </div>
    </div><!-- End Stats Item -->

  </div>

</div>

</section><!-- /Stats Section -->


    <!-- Details Section -->
<section id="features" class="details section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Fitur</h2>
  <div><span>Check Fitur-fitur</span> <span class="description-title"> Utama Kami</span></div>
</div><!-- End Section Title -->

<div class="container">
  <div class="row gy-4 align-items-center features-item">
    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
      <img src="{{ asset('frontend/assets/img/map.png') }}" class="img-fluid" alt="">
    </div>
    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
      <h3>Pelacak Lokasi.</h3>
      <p class="fst-italic">
        Google Maps, selain menjadi panduan navigasi yang handal, juga menawarkan fitur pelacakan lokasi yang sangat berguna. Fitur ini memungkinkan pengguna untuk melacak lokasi mereka sendiri atau lokasi orang lain melalui lokasi yang telah dimasukkan sebelumnya pada peta digital.
      </p>
      <ul>
        <li><i class="bi bi-check"></i><span> Akurat: Menggunakan teknologi GPS yang canggih, Google Maps memberikan informasi lokasi yang sangat akurat.</span></li>
        <li><i class="bi bi-check"></i> <span>Mudah digunakan: Antarmuka Google Maps yang intuitif membuat fitur pelacakan lokasi mudah dipahami dan digunakan oleh siapa saja.</span></li>
        <li><i class="bi bi-check"></i> <span>Berbagi lokasi: Anda bisa membagikan lokasi Anda dengan teman atau keluarga, sehingga mereka tahu di mana Anda berada.</span></li>
      </ul>
    </div>
  </div><!-- Features Item -->

  <div class="row gy-4 align-items-center features-item">
    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
      <img src="{{ asset('frontend/assets/img/money-transfer.png') }}" class="img-fluid" alt="">
    </div>
    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
      <h3>Pemesanan dan pembayaran yang mudah</h3>
      <p class="fst-italic">
        Dapatkan bantuan yang Anda butuhkan dengan mudah dan lakukan pembayaran secara aman melalui berbagai metode pembayaran yang tersedia di HelpMatch.
      </p>
      <p>
        Nikmati pengalaman transaksi yang aman dan transparan saat menggunakan HelpMatch. Semua transaksi Anda dijamin keamanannya dengan sistem enkripsi yang kuat, dan Anda akan selalu mendapatkan rincian biaya yang jelas sebelum melakukan pembayaran, tanpa adanya biaya tersembunyi.
      </p>
    </div>
  </div><!-- Features Item -->
</div>


 <!-- Testimonials Section -->
<section id="testimonials" class="testimonials section dark-background">

<img src="{{ asset('frontend/assets/img/tes.png') }}" class="testimonials-bg" alt="">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        }
      }
    </script>
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div class="testimonial-item">
          <img src="{{ asset('frontend/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
          <h3>Saul Goodman</h3>
          <h4>Ceo &amp; Founder</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Helpmatch benar-benar menyelamatkan hari saya! Saya membutuhkan bantuan mendesak untuk memperbaiki keran bocor di rumah, dan dalam waktu 30 menit, seorang ahli datang dan menyelesaikannya. Proses pemesanan super mudah, dan komunikasinya jelas. Sangat direkomendasikan!.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="swiper-slide">
        <div class="testimonial-item">
          <img src="{{ asset('frontend/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
          <h3>Sara Wilsson</h3>
          <h4>Designer</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Ide Helpmatch sangat brilian! Saya baru saja menggunakannya untuk mencari seseorang membantu membersihkan rumah menjelang acara keluarga. Responnya cepat, dan harganya juga cukup terjangkau. Semoga ke depannya ada lebih banyak pilihan jasa di daerah saya!.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="swiper-slide">
        <div class="testimonial-item">
          <img src="{{ asset('frontend/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
          <h3>Jena Karlis</h3>
          <h4>Store Owner</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Sungguh layanan luar biasa! Saya mencoba Helpmatch untuk menyewa tenaga angkut barang pindahan. Mereka profesional, ramah, dan tepat waktu. Fitur tracking real-time di websitenya sangat membantu untuk memantau proses. Akan menggunakan lagi pasti!.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="swiper-slide">
        <div class="testimonial-item">
          <img src="{{ asset('frontend/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
          <h3>Matt Brandon</h3>
          <h4>Freelancer</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Platformnya bagus dan user-friendly, tapi sayang sekali beberapa penyedia jasa terlambat datang. Mungkin Helpmatch bisa meningkatkan sistem verifikasi penyedia jasa agar lebih konsisten. Tapi overall, pengalaman saya cukup memuaskan..</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="testimonial-item">
          <img src="{{ asset('frontend/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
          <h3>John Larson</h3>
          <h4>Selebgram</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>WOW bagus sekali sangat berguna untuk membantu pekerjaan karna saya tidak pakai ART.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div>

    </div>
  </div>

</div>

</section><!-- /Testimonials Section -->


<section id="contactUs" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <div><span>Check Our</span> <span class="description-title">Contact</span></div>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Alamat</h3>
            <p>Jln. Margonda Raya, Kota Depok, Jawa Barat, 16424</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>0895-2375-1463</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>HelpMatch@Gmail.com</p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="col-lg-8">
  <form action="#" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
    @csrf <!-- Tambahkan token CSRF untuk perlindungan terhadap serangan CSRF -->
    <div class="row gy-4">

      <div class="col-md-6">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
      </div>

      <div class="col-md-6">
        <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
      </div>

      <div class="col-md-12">
        <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
      </div>

      <div class="col-md-12">
        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
      </div>

      <div class="col-md-12 text-center">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>

        <button type="submit">Send Message</button>
      </div>

    </div>
  </form>
</div><!-- End Contact Form -->

</div>

</div>

</section><!-- /Contact Section -->


  </main>

  <footer id="footer" class="footer dark-background">
  <div class="container footer-top offset-5">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
          <span class="sitename">HelpMatch</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Jln. Margonda Raya, Kota Depok</p>
          <p>Jawa Barat, 16424</p>
          <p class="mt-3"><strong>Phone:</strong> <span>0895-2375-1463</span></p>
          <p><strong>Email:</strong> <span>HelpMatch@Gmail.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">HelpMatch</strong> <span>All Rights Reserved</span></p>
  </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>