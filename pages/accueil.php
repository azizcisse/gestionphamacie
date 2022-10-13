<?php   
       
       require_once("connexiondb.php");
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Page d'Accueil de la Pharmacie Khadija</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i>Du Lundi - Samedi, 8h00 à 23h59
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Appelez-nous maintenant +221 77 195 62 76
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="p-1 fixed-top navbar-dark bg-default">
  <script async src='https://stackwhats.com/pixel/af9e6c99598d3c88e1a50e8ab38006'></script>
    <div class="container d-flex align-items-center">
      <script type="text/javascript">
        function blink() {
          var blinks = document.getElementsByTagName('blink');
          for (var i = blinks.length - 1; i >= 0; i--) {
            var s = blinks[i];
            s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
          }
          window.setTimeout(blink, 1500);
        }
        if (document.addEventListener)
          document.addEventListener("DOMContentLoaded", blink, false);
        else if (window.addEventListener)
          window.addEventListener("load", blink, false);
        else if (window.attachEvent)
          window.attachEvent("onload", blink);
        else
          window.onload = blink;
      </script>
      <blink>
        <a href="accueil.php" class="logo me-auto"><img src="../assets/img/Cap.PNG" alt="" width="200"></a>
      </blink>

      <nav id="navbar" class="navbar navbar-inverse">
        <ul class="col-md-5 text-end">
          <li><a class="nav-link scrollto " href="accueil.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">A Propos</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Pharmacie</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Prendre</span>
      Rendez-Vous</a>
        <div class="col-md-4 text-end">
          <a href="login.php"><button type="button" class="btn btn-success me-2">Gestion De La Pharmacie</button></a>
        </div>
    </div>
   
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(../assets/img/slide/slide-1.jpg)">
          <div class="container">
            <MARQUEE BGCOLOR="red"><h2>Bienvenue à la Pharmacie <span>Khadija</span></h2> </MARQUEE>           
            <a href="#about" class="btn-get-started scrollto">Voir Plus</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/slide-2.JPG)">
          <div class="container">
            <MARQUEE BGCOLOR="red"><h2>Bienvenue à la Pharmacie <span>Khadija</span></h2> </MARQUEE>           
            <a href="#about" class="btn-get-started scrollto">Voir Plus</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/slide-3.jpg)">
          <div class="container">
            <MARQUEE BGCOLOR="red"><h2>Bienvenue à la Pharmacie <span>Khadija</span></h2> </MARQUEE>
            <a href="#about" class="btn-get-started scrollto">Voir Plus</a>
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
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>A Propos</h2>
          <p>A la pharmacie Khadija vos ordonnances sont servis. Vous trouverez toutes les médicaments standards légaux.
            Toutefois elle  n'est pas conçu que pour des médicaments mais aussi pour la cosmétique et de l'alimentaire pour
            bébé et adulte. Nos rayons vous charmes avec leurs produits de qualité. Alors n'attendez plus rendez vous a la
            pharmacie Khadija de Dakar.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="../assets/img/about1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Présentation de la Pharmacie</h3>
            <p class="fst-italic">
              La Pharmacie a pour mission la conception, la mise en œuvre et le suivi de la politique et des programmes dans le domaine de la pharmacie, du médicament.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Aucune Société ne peut fonctionner si ce n'est pour en atteindre les objectifs.</li>
              <li><i class="bi bi-check-circle"></i>Le rassemblement et l'exploitation de toutes les informations relatives à la pharmacie et au médicament dans leurs différents aspects.</li>
              <li><i class="bi bi-check-circle"></i>La délivrance de visa pour les médicaments, les réactifs de laboratoires d’analyses médicales et les dispositifs médicaux et d’en opérer le contrôle de qualité.</li>
            </ul>
            <p>
              L'élaboration des textes législatifs et réglementaires relatifs à la pharmacie, aux médicaments et aux substances vénéneuses, à l’alcool, aux laboratoires d’analyses de biologie médicale, aux réactifs de laboratoires d’analyses médicales, et aux dispositifs médicaux et de veiller à leur application.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>PRENDRE RENDEZ-VOUS</h2>
          <p>Toute l’équipe de la Pharmacie Khadija à Dakar est à votre écoute : nous prenons à coeur votre santé et
            mettons tout notre savoir faire de professionnels de la santé à votre service.

            En prolongement de cette attention de tous les jours, la Pharmacie Khadija est heureuse de mettre à votre
            disposition son site internet où vous trouverez des infos de santé, des conseils et toutes les informations
            utiles sur la pharmacie.</p>
        </div>

        <form action="forms/appointment.php" method="post" role="form" class="php-email-form" data-aos="fade-up"
          data-aos-delay="100">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime" name="date" class="form-control datepicker" id="date"
                placeholder="Appointment Date" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select">
                <option value="">Choisir Heure</option>
                <option value="Department 1">10h-11h</option>
                <option value="Department 2">12h-13h</option>
                <option value="Department 3">15h-16h</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Choisir pharmaciens</option>
                <option value="Doctor 1">Pharmacien 1</option>
                <option value="Doctor 2">Pharmacien 2</option>
                <option value="Doctor 3">Pharmacien 3</option>
              </select>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Patientez</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre demande de rendez-vous a été envoyée avec succès. Merci!</div>
          </div>
          <div class="text-center"><button type="submit">PRENDRE RENDEZ-VOUS</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pharmacie</h2>
          <p>Une grande majorité de patients conservent, en vue de les réutiliser, les médicaments non consommés dans le cadre de leur prescription. Cette pratique favorise un mésusage très important des médicaments, c’est-à-dire une utilisation intentionnelle et inappropriée d’un médicament ou d’un produit, non conforme à l’autorisation de mise sur le marché ou à l’enregistrement, ou encore aux recommandations de bonnes pratiques.</p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-1.jpg"><img
                  src="../assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-2.jpg"><img
                  src="../assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-3.jpg"><img
                  src="../assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-4.jpg"><img
                  src="../assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-5.jpg"><img
                  src="../assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-6.jpg"><img
                  src="../assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-7.jpg"><img
                  src="../assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-8.jpg"><img
                  src="../assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>En dehors des horaires habituels d’ouverture des pharmacies, nos agents vous communiqueront les coordonnées
            de la pharmacie de garde proche de chez vous ou nous vous mettrons en relation avec le service recherché. Les
            informations données sont délivrées à titre purement indicatif en complément du service de renseignements
            téléphoniques.</p>
        </div>

      </div>

      <div>
      <iframe style="border:0; width: 100%; height: 350px;"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.909071216051!2d-17.46971558564141!3d14.71773258972797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec172a38aa82f87%3A0xc1062c0b3fa2568c!2sEcole%20Sup%C3%A9rieure%20des%20Sciences%20Appliqu%C3%A9es%20(ESSA)!5e0!3m2!1sfr!2ssn!4v1617269057271!5m2!1sfr!2ssn"
          frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Notre adresse</h3>
                  <p>Au Rond Point Sacré Coeur Rue 235, Dakar-Sénégal</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Envoyez-nous un email</h3>
                  <p>diatoukamara44@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Appelez-Nous</h3>
                  <p>+221 77 195 62 76</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Patientez</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer Message</button></div>
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
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Pharmacie Khadija</h3>
              <p>
                Au Rond Point Sacré Coeur<br>
                Rue 235, Dakar-Sénégal<br><br>
                <strong>Téléphone:</strong> +221 77 195 62 76<br>
                <strong>Email:</strong> diatoukamara44@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liens Utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conditions d'utilisation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politique de confidentialité</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Livraison à domicile</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Prise de Tension</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Vente et Location de Matériel Médical</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Collecte des Médicaments Périmés</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accompagnement Thérapeutique</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Notre Boite à Lettre</h4>
            <p>Cependant, aucune des choses que je lirai mais c'est notre grande faute si j'en lirai beaucoup</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="S'abonner">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Droits d'auteur <strong><span>Pharmacie-Khadija</span></strong>. Tous les droits sont réservés
      </div>
      <div class="credits">

        Conçu par <a href="https://bootstrapmade.com/">Pharmacie-Khadija</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>