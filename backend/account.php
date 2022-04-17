<?php
	session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">
        <!--=============== BOOTSRAP CSS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="../assets/css/styles.css" >
        <link rel="stylesheet" href="style2.css">

        <title>SRJ RENTAL</title>
    </head>
    <body>
    <header class="header" id="header">
            <nav class="nav container">
                <a href="../index.html" class="nav__logo">SRJ RENTAL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="../index.html" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="login.php" class="nav__link"></a>
                        </li>
                        <li class="nav__item">
                            <a href="backend/booking.php" class="nav__link"></a>
                        </li>
                    </ul>

                    <div class="nav__dark">
                        <span class="change-theme-name">Dark mode</span>
                        <i class="ri-moon-line change-theme" id="theme-button"></i>
                    </div>

                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
                </div>
            </nav>
        </header>
        <main class="main">
        <img src="cars/bookhead.jpg" alt="car" class="book__img">
        <section class="account section" id="account">
        <?php
						include 'config.php';
						$sel = "SELECT * FROM client  INNER JOIN cars on cars.car_id = client.car_id WHERE email = '$_SESSION[email]'";
						$rs = $con->query($sel);
						$rws = $rs->fetch_assoc();
			?>
             <?php
						include 'config.php';
						
						$rs = $con->query($sel);
						$rws = $rs->fetch_assoc();
			?>
        <div class="account__container container grid">
            <h1 class="section__title account__title text-center">Welcome <br><?php echo $rws['name'] ?></h1>
            <h3 class="section__title"> Your Account Information <?php echo $rws['name'] ?></h3>
            <div class="container">
            <div class="row">
                <div class="col">
                Your Booked Car
                </div>
                <div class="col">
                Your Personal Information
                </div>
                <div class="col">
                Your Status
                </div>
            </div>
            </div>
            <div class="grid">
            <div class="row">
            <div class="g-col-6 g-col-md-4">
            <div class="card" style="width: 20rem;">
            <img src="cars/<?php echo $rws['image'];?>" class="card-img-top account__car__img" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Booked Car</h5>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_name'];?></p>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_type'];?></p>
            <p class="card-text"><img src="cars/seat.png" alt="" class="car__icon"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['capacity'];?> Seater</p>
            </div>
            </div>
             </div>

            <div class="col-md">
            <div class="card" style="width: 20rem;">
            <img src="cars/<?php echo $rws['image'];?>" class="card-img-top account__car__img" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Booked Car</h5>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_name'];?></p>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_type'];?></p>
            <p class="card-text"><img src="cars/seat.png" alt="" class="car__icon"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['capacity'];?> Seater</p>
            </div>
            </div>
            </div>
             <div class="col-md">
             <div class="card" style="width: 20rem;">
            <img src="cars/<?php echo $rws['image'];?>" class="card-img-top account__car__img" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Booked Car</h5>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_name'];?></p>
            <p class="card-text"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['car_type'];?></p>
            <p class="card-text"><img src="cars/seat.png" alt="" class="car__icon"><img src="cars/arrow.png" alt="" class="car__icon"><?php echo $rws['capacity'];?> Seater</p>
            </div>
            </div>
            </div>
             </div>
            </div>
            </div>
              
           
           
        </section>
       
            
            </main>
            
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content grid">
                        <div class="footer__data">
                            <h3 class="footer__title">SRJ RENTAL</h3>
                            <p class="footer__description">Quality Renatls <br> To
                                Get Your <br> Moving.
                            </p>
                            <div>
                                <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                    <i class="ri-facebook-box-fill"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank" class="footer__social">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                    <i class="ri-youtube-fill"></i>
                                </a>
                            </div>
                        </div>
    
                        <div class="footer__data">
                            <h3 class="footer__subtitle">About</h3>
                            <ul>
                                <li class="footer__item">
                                    <a href="" class="footer__link">About Us</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Features</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">New & Blog</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="footer__data">
                            <h3 class="footer__subtitle">Company</h3>
                            <ul>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Team</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Plan y Pricing</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Become a member</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="footer__data">
                            <h3 class="footer__subtitle">Support</h3>
                            <ul>
                                <li class="footer__item">
                                    <a href="" class="footer__link">FAQs</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Support Center</a>
                                </li>
                                <li class="footer__item">
                                    <a href="" class="footer__link">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="footer__rights">
                        <p class="footer__copy">&#169; 2022 SRJ RENTAL. All rigths reserved.</p>
                        <div class="footer__terms">
                            <a href="#" class="footer__terms-link">Terms & Agreements</a>
                            <a href="#" class="footer__terms-link">Privacy Policy</a>
                        </div>
                    </div>
                </div>
    </footer>
    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>
                <script src="../assets/js/swiper-bundle.min.js"></script>

                <script src="../assets/js/main.js"></script>
            </body>
        </html>