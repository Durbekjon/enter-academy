<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="/front/assets/img/enterzk.png" rel="icon">
    <link href="/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <title>@foreach ($name as $n)
      {{$n->name}}
  @endforeach</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/front/assets/img/enterzk.png" rel="icon">
  <link href="/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  {{-- <link href="/front/assets/vendor/aos/aos.css" rel="stylesheet"> --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="/front/assets/css/style.css" rel="stylesheet">


</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="/">
          @foreach ($name as $n)
            {{$n->name}}
        @endforeach
      </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/front/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>

          <li><a class="nav-link scrollto" href="#faq">News</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Welcome to 
        @foreach ($name as $n)
            {{$n->name}}
        @endforeach
      </h1>
      <h2></h2>
      <a href="#services" class="btn-get-started scrollto">Courses</a>
    </div>
  </section><!-- End Hero -->


  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-xl-6 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="zoom-in">
          <a href="https://youtu.be/WZ3lg6uaWbc" class="venobox play-btn mb-4" data-vbtype="video"
            data-autoplay="true"></a>
        </div>

        <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <div class="box-heading" data-aos="fade-up">
            <h4>About Us</h4>
            <h3>Study in the summer, get a profitable job in the winter!</h3>
            <p>Dedicate the summer to acquiring new knowledge and enriching the old! Well, what kind of knowledge do you mean?
               do you think we are holding?</p>
          </div>
          @foreach ($about as $a)
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="{{$a->icon}}"></i></div>
              <h4 class="title"><a href="">{{$a->name}}</a></h4>
              <p class="description">{{$a->about}}</p>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </section>



  <section id="services" class="services">
    <div class="container">

      <div class="section-title" data-aos="zoom-in">
        <h2>Services</h2>
        <h3> Our <span>Services</span></h3>
       
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box" data-aos="zoom-in">
            <div class="icon">
              <p style="font-size: 38px; font-family: Arial, Helvetica, sans-serif; color: rgba(89, 134, 45, 0.791);">F
              </p>
            </div>
            <h4><a href="">Frontend</a></h4>
            <p>A frontend is a part of a programming structure that is responsible for creating a visible user interface (UI) and allowing the user to interact with the application. A frontend developer masters the design of the interface, creates web pages and adds interactivity.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Backend</a></h4>
            <p>Backend is a part of a programming structure that deals with interface and data communication through control panel, servers, databases and programming language. A backend developer or engineer creates this part and is responsible for it.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Android</a></h4>
            <p>Android programming is a field of programming that involves creating mobile applications and programs to run on the Android operating system. Android programming allows you to create applications for devices that are compatible with the Android platform.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Graphics design</a></h4>
            <p>Graphic design is a set of techniques and practices that include creative forces and methods that work together to create visual aspects and use external visual aids using aesthetic and communication principles.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Engilish</a></h4>
            <p>English is one of the most widely spoken languages in the world. It is one of the most studied and used languages after Uzbek in many countries, events, organizations, business and international communication.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Computer literacy</a></h4>
            <p>Computer science is a field that studies basic knowledge related to computers and their use. It includes a good understanding of personal computers, software, the Internet, and other important technologies that enable people to use computers wisely and to use them for private purposes.</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="section-title" data-aos="zoom-in">
        <h2>Team</h2>
        <h3>Our Team <span> Members</span></h3>
    
      </div>

      <div class="row">
        @foreach ($team as $t)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up">
            <div class="member-img">
              <img src="/team/{{$t->img}}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>{{$t->name}}</h4>
              <span>{{$t->job}}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          @foreach ($teacher as $t)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/teachers/{{$t->img}}" class="testimonial-img" alt="">
                <h3>{{$t->name}}</h3>
                <h4>{{$t->job}}r</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$t->message}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>  
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div><!-- End testimonial item -->
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->



  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">
    <div class="container">

      <div class="section-title" data-aos="zoom-in">
        <h2>NEWS</h2>
        <h3>Frequently updated <span>news</span></h3>
      
      </div>

      <div class="faq-list">
        <ul>
          @foreach ($news as $new)
            <li data-aos="fade-up">
              <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{$new->id}}">{{$new->name}}<i class="bx bx-chevron-down icon-show"></i><i
                  class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{$new->id}}" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  {{$new->about}}
                </p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>

    </div>
  </section><!-- End F.A.Q Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title" data-aos="zoom-in">
        <h2>CONTACT US</h2>
        <h3> <span>Contact </span> Details</h3>
        
      </div>

      <div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d762.8201392879279!2d67.85161799451602!3d40.11375074780531!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1687544918998!5m2!1sru!2s"
          style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="row mt-5">
        @foreach ($info as $i)
          <div class="col-lg-4" data-aos="fade-right">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>{{$i->location}}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{$i->email}}/p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Phone Number:</h4>
              <p>{{$i->number}}</p>
            </div>

          </div>

        </div>
        @endforeach
        

        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

          <form action="/sendMessage" method="post" >
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email"
                  placeholder="Your email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="about" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Your message" required></textarea>
            </div>
            <br>
            <div class="text-center"><button type="submit" class=""
              style="
                    background: #8fc04e;
                    border: 0;
                    padding: 10px 24px;
                    color: #fff;
                    transition: 0.4s;
                    border-radius: 50px;
                "
              >Xabar Yuborish</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row  justify-content-center">
          <div class="col-lg-6">
            <h3>ENTER ACADEMY</h3>
          
          </div>
        </div>

        <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="/subscribe" method="post">
              @csrf
              <input type="email" name="email" style="outline: none" placeholder="Elektron pochtangizni kiriting"><input type="submit"
                value="Obuna">
            </form>
          </div>
        </div>

        <div class="social-links">
          @foreach ($social as $soc)
              <a href="{{$soc->link}}" class="{{$soc->name}}"><i class="bx bxl-{{$soc->name}}"></i></a>
          @endforeach
          
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Mualliflik huquqi <strong><span>ENTER ACADEMY</span></strong>. Barcha Huquqlar Himoyalangan
      </div>
      <div class="credits">

        Designed by <a href="https://bootstrapmade.com/">Diyor Musulmanov</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/front/assets/vendor/aos/aos.js"></script>
  <script src="/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/front/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Template Main JS File -->
  <script src="/front/assets/js/main.js"></script>

</body>

</html>