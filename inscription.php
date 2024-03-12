<?php

@include 'bdd/config.php';

if(isset($_POST['submit'])){

   $Nmm = mysqli_real_escape_string($conn, $_POST['nm']);
   $Prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
   $Age = mysqli_real_escape_string($conn, $_POST['age']);
   $Adrs = mysqli_real_escape_string($conn, $_POST['adresse']);
   $Nt = mysqli_real_escape_string($conn, $_POST['nt']);
   $Nrtf = mysqli_real_escape_string($conn, $_POST['nrtf']);

   $Mail = mysqli_real_escape_string($conn, $_POST['mail']);
   $Mdps = md5($_POST['mdps']);
   $Cmdps = md5($_POST['cmdps']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM inscription WHERE mail = '$Mail' && mdps = '$Mdps' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($Mdps != $Cmdps){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO inscription(nm, prenom, age,adresse,nt,nrtf,mail,mdps,user_type) VALUES('$Nmm','$Prenom','$Age','$Adrs','$Nt','$Nrtf','$Mail','$Mdps','$user_type')";
         mysqli_query($conn, $insert);
         header('index.html');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Inscription|| DAZE Shotokan </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo_1.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/1.css">

    <link rel="stylesheet" href="assets/css/1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo_1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <header>
        <!-- Header Start -->
        <div  class="header-area header-transparent">
            <div style="background-color: rgba(8, 23, 92, 0.842);" class="main-header header-sticky">
                <div   class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img style="height: 100px;" src="assets/img/logo/logo_1.png" alt=""></a>
                        </div>

                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a style="color: rgb(255, 255, 255);" href="index.html">accueil</a></li>
                                    <li><a style="color: rgb(255, 255, 255);" href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

    </header>
    <main>
        <div class="stepper">
            <div class="step--1 step-active">Étape 1</div>
            <div class="step--2">Étape 2</div>
            <div class="step--3">Étape 3</div>
            <div class="step--4">Fin</div>
        </div>
        <form class="form form-active" method="POST" action="">
            <div  class="form--header-container">
                <h1 style="font-size: 30px; margin-top: 20px;" class="form--header-title">
                    Informations personnelles
                </h1>


            </div>
           
            <input name="nm" type="text" placeholder="Nom" />
            <input name="prenom" type="text" placeholder="Prenom" />
            <input name="age" type="text" placeholder="Votre age" />
            <button class="form__btn" id="btn-1">Suivant</button>
        </form>
        <form class="form" method="POST" action="">
            <div class="form--header-container">
                <h1 style="font-size: 30px; margin-top: 20px;" class="form--header-title">
                    Informations personnelles
                </h1>


            </div>
            
            <input name="adresse" type="text" placeholder="Votre adresse" />
            <input name="nt" type="text" placeholder="Nationalité" />
            <input name="nrtf" type="text" placeholder="votre numéro de téléphone" />
            <button class="form__btn" id="btn-2-prev">Précédent</button>
            <button class="form__btn" id="btn-2-next">Suivant</button>
        </form>
        <form class="form" method="POST" action="">
            <div class="form--header-container">
                <h1 style="font-size: 30px; margin-top: 20px;"  class="form--header-title">
                    Informations personnelles
                </h1>

                
            </div>
                <?php
                  if(isset($error)){
                  foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
                   };
                  };
                ?>
            <input style="width: 400px; height: 50px; border-radius: 10px; "  name="mail" type="email" placeholder="    E-mail" />
            <br><br>
            <input style="width: 400px; height: 50px; border-radius: 10px;" name="mdps" type="password" placeholder="    Mot de passe" />
            <br><br>
            <input style="width: 400px; height: 50px; border-radius: 10px;" name="cmdps"type="password" placeholder="    Confirmation du mot de passe" />
            <br><br>
            <select style="margin-right: -10px;" name="user_type">
                <option  value="user">utilisateur</option>
                <option  value="admin">admin</option>
             </select>
             <br><br><br><br><br>
           
            <input type="submit" name="submit" value="register now" class="form-btn">
        </form>
        <div class="form--message">Votre Inscription est Envoyé avec succès</div>
    </main>
    <script src="./1.js"></script>

    <section class="services-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-caption">
                            <h3>Localisation</h3>
                            <p>1 Rue Matisse Nimes France</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-caption">
                            <h3>Nr.Telephone</h3>
                            <p>003379092324</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-caption">
                            <h3>E-mail</h3>
                            <p>abdelmounaimelhouzi@gmail.com</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <!--? Footer Start-->
        <div class="footer-area black-bg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- Footer Menu -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="single-footer-caption mb-50 text-center">
                                <!-- logo -->
                                <div class="footer-logo wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                    <a href="index.html"><img style="height: 100px;" src="assets/img/logo/logo_1.png" alt=""></a>
                                </div>
                                <!-- Menu -->
                                <!-- Header Start -->
                                <div class="header-area main-header2 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                    <div class="main-header main-header2">
                                        <div class="menu-wrapper menu-wrapper2">
                                            <!-- Main-menu -->
                                            <div class="main-menu main-menu2 text-center">
                                                <nav>
                                                    <ul>
                                                        <li><a href="index.html">accueil</a></li>

                                                        <li><a href="courses.html">Cours</a></li>
                                                        <li><a href="pricing.html">tarifs</a></li>

                                                        <li><a href="contact.html">Contact</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header End -->
                                <!-- social -->
                                <div class="footer-social mt-30 wow fadeInUp" data-wow-duration="3s" data-wow-delay=".8s">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/profile.php?id=100068475923782"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/elhz_abdelmounaim/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="footer-copy-right text-center">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> EL HOUZI Abdelmounaim<i class="fa fa-heart" aria-hidden="true"></i>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>