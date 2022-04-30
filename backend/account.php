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
                            <a href="logout.php" class="nav__link">Logout</a>
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
						$sel = "SELECT *,(return_date-pickup_date) AS days FROM client  INNER JOIN cars on cars.car_id = client.car_id WHERE email = '$_SESSION[email]'";
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
            <div class="row">
            <div class="card-deck">
            <div class="card h-100" style="width: 20rem;">
            <img src="cars/img/<?php echo $rws['image'];?>" class="card-img-top account__img" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Booked Car</h5>
            <p class="card-text"><img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['car_name'];?></p>
            <p class="card-text"><img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['car_type'];?></p>
            <p class="card-text"><img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['cost'];?>/Day</p>
            <p class="card-text"><img src="cars/seat.png" alt="" class="car__icon"><img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['capacity'];?> Seater</p>
            </div>
            </div>
            </div>
            <div class="col">
            <div class="card h-100" style="width: 20rem;">
            <img src="cars/account.png" class="card-img-top account__img-one" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Profile</h5>
            <p class="card-text">Email<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['email']?></p>
            <p class="card-text">Mobile<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['mobile']?></p>
            <p class="card-text">City<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['city'];?></p>
            </div>
            </div>
            </div>
             <div class="col">
             <div class="card h-100" style="width: 20rem;">
             <?php
                $status= $rws['status'];
                if ($status == "pending") {
                    echo'<img src="cars/pending.png" class="card-img-top account__img-one" name="pendingImg">';
                    echo'Wait For Payment Verification';
                } 
                elseif($status == "approve") {
                    echo'<img src="cars/approve.gif" class="card-img-top account__img-one" name="ApproveImg">';  
                    echo'<p class="approve__title"><img src="cars/arrow.gif" alt="" class="car__icon">Thankyou our Team Contact You For Pickup Location and PaperWork.</p>';
                }
                elseif($status =="cancel"){
                    echo'<img src="cars/cancel.png" class="card-img-top account__img-one" name="CancelImg">';
                    echo'Not Paid';
                }
                ?>  
            <div class="card-body">
            <h5 class="card-title">Status Of Booking</h5>
            <p class="card-text">Status<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['status'];?></p>
            </div>
            </div>
            </div>
            </div>
            <div class="container">
                <div class="row">
                            <div class="col">
                            Your Payment
                            </div>
                            <div class="col">
                            Your Booking Details
                            </div>
                            <div class="col">
                            
                            </div>
                            </div>
                            </div>
            <div class="row">
            <div class="car-deck">
            <div class="card h-100" style="width: 20rem;">
            <img src="cars/payment.png" class="card-img-top account__img-one" alt="car">
            <div class="card-body">
            <h5 class="card-title">Your Payment</h5>
            <a href="pay.php" class="btn-primary button">Pay</a>
            <p class="card-text">Date<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['upi_date'];?></p>
            <p class="card-text">Upi Id<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['upi_id'];?></p>
            <p class="card-text">Amount <img src="cars/arrow.gif" alt="" class="car__icon">&#8377;<?php echo $rws['amount'];?> </p>
            <p class="card-text">Status<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['upi_status'];?> </p>
            </div>
            </div>
            </div>    
            <div class="col-md">
            <div class="card h-100" style="width: 20rem;">
            <img src="cars/booking.png" class="card-img-top account__img-one" alt="booking">
            <div class="card-body">
            <h5 class="card-title">Your Booking</h5>
            <p class="card-text">Pick Up Date<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['pickup_date'];?> </p>
            <p class="card-text">Return Date<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['return_date'];?> </p>
            <p class="card-text">Total Days<img src="cars/arrow.gif" alt="" class="car__icon"><?php echo $rws['days'];?> </p>
            <p class="card-text">Total Amount<img src="cars/arrow.gif" alt="" class="car__icon"> &#8377;<?php echo $rws['amount'];?> </p>
            </div>
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