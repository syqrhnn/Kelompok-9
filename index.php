<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Project UTS Pemweb</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/bengkelgo-1.png" rel="icon">
  <link href="assets/img/bengkelgo-1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="main.css" rel="stylesheet">

  <!--font eksternal-->
  <style type="text/css">
    @font-face {
      font-family: speedbeast;
      src: url("assets/fonts/SpeedBeast.ttf");
    }

    #font {
      font-family: speedbeast;
      font-size: 50px;
    }

    .body-team {
      min-width: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-family: "Poppins";
    }

    .accordion {
      width: 50%;
      display: flex;
      justify-content: center;
      height: 400px;
      gap: 16px;
      transition: 0.3s;
      padding-left: 0px;
    }

    .accordion:hover {
      gap: 0;
    }

    .accordion h2 {
      font-size: 24px;
      border-bottom: solid #fff;
      white-space: nowrap;
    }

    .accordion li {
      position: relative;
      overflow: hidden;
      flex: 0 0 80px;
      border-radius: 50px;
      opacity: 0.9;
    }

    .accordion li img {
      position: absolute;
      top: 50%;
      left: 50%;
      translate: -50% -50%;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .accordion li,
    .accordion li img,
    .accordion li .content,
    .accordion li .content span {
      transition: 0.3s;
    }

    .accordion li .content {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 1;
      color: #fff;
      padding: 15px;
      background: #02022e;
      background: linear-gradient(0deg,
          rgb(0 0 0 / 70%) 10%,
          rgb(255 255 255 / 0%) 100%);
      opacity: 0;
      visibility: hidden;
    }

    .accordion li .content span {
      position: absolute;
      z-index: 3;
      left: 50%;
      bottom: 18px;
      translate: -300px 0;
      visibility: hidden;
      opacity: 0;
    }

    .accordion li:hover {
      flex: 0 1 260px;
      scale: 1.1;
      z-index: 10;
      opacity: 1;
    }

    .accordion li:hover .content {
      opacity: 1;
      visibility: visible;
    }

    .accordion li:hover span {
      translate: -50% 0;
      opacity: 1;
      visibility: visible;
    }

    .container1 {
      width: 60%;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 1);
    }

    .form-bengkel {
      display: grid;
      grid-template-columns: 1fr;
      gap: 15px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    label {
      font-size: 16px;
      margin-bottom: 5px;
    }

    input,
    select,
    textarea {
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    button[type="submit"] {
      padding: 12px 20px;
      background-color: #02022e;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    button[type="submit"]:hover {
      background-color: #434b7d;
    }

    @media (max-width: 768px) {
      .container {
        width: 90%;
      }
    }
  </style>
  <!--end font eksternal-->

</head>

<body class="page-index">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top" style="padding-bottom: 0px; padding-top: 0px;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/Adobe Express 2025-05-10 20.35.11.png" alt="" width="100px" height="200px">
        <h1 id="font" class="d-flex align-items-center">Car Rental</h1>
        <a href="#why-us">Keunggulan</a>
        <a href="#services-list">Layanan Kami</a>
        <a href="#portfolio">Galerry</a>
        <a href="#contact">Kontak</a>
        <a href="#address">Alamat</a>
        <a href="#logins">Login</a>
      </a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <h2 data-aos="fade-up">Rental Mobil dengan Pelayanan Terbaik!</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>Apakah Anda membutuhkan kendaraan sewa dengan cepat dan mudah? Tenang, kami siap memberikan layanan
              terbaik untuk Anda. Dengan armada terawat dan proses pemesanan yang praktis, kami hadir untuk memenuhi
              kebutuhan transportasi Anda, khususnya di wilayah <b>Depok</b> dan sekitarnya.</p>
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="https://wa.me/6285947370503" target="_blank" class="btn-get-started2 bi-whatsapp"> Whatsapp</a>
          </div><br>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="https://www.instagram.com/syqrhnn_?igsh=MTgxdWpxNWQ5M2tqNg==" target="_blank"
              class="btn-get-started2 bi-instagram"> Instagram</a>
          </div><br>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="https://www.tiktok.com/https://www.tiktok.com/@ahmadsyauqiraihan?_t=8rr5HqO2tZC&_r=1"
              target="_blank" class="btn-get-started2 bi-tiktok"> tiktok</a>
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


      <!--  ************************* Logins ************************** -->


<section id="logins" class="our-blog container-fluid" style="background-color: #f9f9f9; padding: 50px 0;">
    <div class="container">
        <div class="inner-title text-center mb-5">
            <h2 id="font" style="font-weight: bold;">Logins</h2>
        </div>
        <div class="col-sm-12 blog-cont">
            <div class="row no-margin">
                <div class="col-sm-6 blog-smk mb-4">
                    <div class="blog-single" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: 0.3s;">
                        <img src="assets/img/customer1.jpg" alt="Customer" style="width: 100%; height: 250px; object-fit: cover; border-bottom: 1px solid #eee;">
                        <div class="blog-single-det text-center p-3">
                            <h6 style="font-size: 20px; font-weight: 600;">Customer Login</h6>
                            <a href="Dashboard_customer/login.php">
                                <button class="btn btn-success btn-sm" style="border-radius: 25px; padding: 8px 20px; font-weight: bold;">Click Here</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 blog-smk mb-4">
                    <div class="blog-single" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: 0.3s;">
                        <img src="assets/img/customer2.jpg" alt="Pegawai" style="width: 100%; height: 250px; object-fit: cover; border-bottom: 1px solid #eee;">
                        <div class="blog-single-det text-center p-3">
                            <h6 style="font-size: 20px; font-weight: 600;">Pegawai Login</h6>
                            <a href="Dashboard_pegawai/views/login.php">
                                <button class="btn btn-success btn-sm" style="border-radius: 25px; padding: 8px 20px; font-weight: bold;">Click Here</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



  <main id="main">

    


    <!-- ======= Why Choose Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Kenapa Pilih Kami</h2>
        </div>

        <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

          <div class="col-xl-5 img-bg" style="background-image: url('assets/img/pilihrental1.jpg')"  ></div>
          <div class="col-xl-7 slides position-relative">

            <div class="slides-1 swiper">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Armada Terawat & Berkualitas</h3>
                    <h4 class="mb-3">Kami berkomitmen memberikan kendaraan dalam kondisi prima untuk setiap pelanggan
                    </h4>
                    <p>Semua mobil kami selalu dicek dan dirawat secara berkala untuk memastikan kenyamanan dan keamanan
                      Anda selama berkendara.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Layanan Jujur dan Transparan</h3>
                    <h4 class="mb-3">Harga sewa yang jelas tanpa biaya tersembunyi</h4>
                    <p>Kami menjamin transparansi dalam setiap transaksi. Anda akan mengetahui semua detail biaya di
                      awal tanpa kejutan tambahan.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Proses Cepat dan Mudah</h3>
                    <p>Pemesanan mobil bisa dilakukan secara online dan proses pengambilan/pengembalian kendaraan sangat
                      efisien.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Mobil Terbaru dan Nyaman</h3>
                    <p>Kami menyediakan berbagai pilihan mobil terbaru dengan interior bersih dan nyaman untuk segala
                      kebutuhan Anda.</p>
                  </div>
                </div> <!-- End slide item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>
    </section><!-- End Why Choose Us Section -->

<!-- ======= Our Services Section ======= -->
<section id="services-list" class="services-list">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Layanan Kami</h2>
    </div>

    <div class="row gy-5 justify-content-center">

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="icon flex-shrink-0"><i class="bi bi-car-front-fill" style="color: #f57813;"></i></div>
        <div>
          <h4 class="title"><a href="#" class="stretched-link">Sewa Mobil Harian</a></h4>
          <p class="description">Layanan rental mobil untuk kebutuhan harian Anda, cocok untuk perjalanan bisnis, liburan, atau keperluan mendadak.</p>
        </div>
      </div>
      <!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="icon flex-shrink-0"><i class="bi bi-calendar-check" style="color: #15a04a;"></i></div>
        <div>
          <h4 class="title"><a href="#" class="stretched-link">Sewa Mobil Mingguan/Bulanan</a></h4>
          <p class="description">Paket hemat untuk penyewaan jangka panjang, cocok untuk keperluan kerja atau mobilitas jangka menengah.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
        <div class="icon flex-shrink-0"><i class="bi bi-people-fill" style="color: #d90769;"></i></div>
        <div>
          <h4 class="title"><a href="#" class="stretched-link">Sewa Mobil dengan Sopir</a></h4>
          <p class="description">Nikmati perjalanan tanpa repot dengan layanan sopir berpengalaman dan ramah.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
        <div class="icon flex-shrink-0"><i class="bi bi-geo-alt-fill" style="color: #f5cf13;"></i></div>
        <div>
          <h4 class="title"><a href="#" class="stretched-link">Layanan Antar Jemput</a></h4>
          <p class="description">Kami siap mengantar dan menjemput kendaraan sesuai lokasi Anda untuk kenyamanan maksimal.</p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>
</section><!-- End Our Services Section -->


        </div>

      </div>
    </section><!-- End Our Services Section -->

   

    <!-- ======= Clients Section ======= ubah-->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/porsche.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/todaihatsu.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/lambo.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/honda.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/tesla.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/bmw.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/mits.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/tohyu.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

<section id="portfolio" class="portfolio sections-bg">
    <!--  ************************* Gallery Starts Here ************************** -->
    <div id="gallery" class="gallery">
        <div class="container">
            <div class="inner-title">

                <h2 id="font">Car Gallery</h2>
                <p class="bold">View Our Gallery</p>
            </div>
            <div class="row">


                <div class="gallery-filter d-none d-sm-block">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    <button class="btn btn-default filter-button" data-filter="sport">Sport</button>
                    <button class="btn btn-default filter-button" data-filter="sedan">Sedan</button>
                    <button class="btn btn-default filter-button" data-filter="mpv">MPV</button>
                    <button class="btn btn-default filter-button" data-filter="suv">SUV</button>
                </div>
                <br />



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sport">
                    <img src="assets/img/mobil/sport.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter suv">
                    <img src="assets/img/mobil/suv.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sedan">
                    <img src="assets/img/mobil/sedan.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter mpv">
                    <img src="assets/img/mobil/mpv.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sedan">
                    <img src="assets/img/mobil/sedan2.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sport">
                    <img src="assets/img/mobil/sport2.jpg" class="img-responsive">
                </div>

            </div>
        </div>


    </div>
    <!-- ######## Gallery End ####### -->

    </div>

  </div>
</section>


    <!--team-->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Tim Kami</h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <div class="body-team">
            <ul class="accordion">
              <li>
                <img src="assets/img/syauqi.jpg" alt="">
                <div class="content">
                  <span>
                    <h2>Syauqi</h2>
                    <p>0110124248</p>
                    <p>SI 03</p>
                  </span>
                </div>
              </li>
              <li>
                <img src="assets/img/yazid.jpg" alt="">
                <div class="content">
                  <span>
                    <h2>Yazid</h2>
                    <p>0110124092</p>
                    <p>SI 03</p>
                  </span>
                </div>
              </li>
              <li>
                <img src="assets/img/dela.jpg" alt="">
                <div class="content">
                  <span>
                    <h2>Dela</h2>
                    <p>0110124007</p>
                    <p>SI 03</p>
                  </span>
                </div>
              </li>
              <li>
                <img src="assets/img/helena.jpg" alt="">
                <div class="content">
                  <span>
                    <h2>Helena</h2>
                    <p>0110124188</p>
                    <p>SI 03</p>
                  </span>
                </div>
              </li>
              <li>
                <img src="assets/img/rifka.jpg" alt="">
                <div class="content">
                  <span>
                    <h2>Rifka</h2>
                    <p>0110124046</p>
                    <p>SI 03</p>
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </section>
    <!--end team-->

    <!-- ======= Contact Section ======= -->
    <section id="address" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Alamat</h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9708308146983!2d106.77421618211848!3d-6.39776045098345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e900609a45ef%3A0x83428e95affe46e7!2sParung%20Bingung!5e0!3m2!1sid!2sid!4v1733067467312!5m2!1sid!2sid"
              frameborder="0" style="border:0; width: 100%; height: 480px;" allowfullscreen></iframe>
          </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin: 0; padding: 0;">

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Car Rental</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
          Re-Designed by <a href="https://github.com/syqrhnn" target="_blank"><strong>My Team</strong></a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>


</body>

</html>