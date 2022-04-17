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
            
        <section class="book_section" id="book">
        <img src="cars/bookhead.jpg" alt="car" class="book__img">
        <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">UPI Transaction</h2>
                        <img src="cars/upi.jpg" alt="" class="qr__img">
                    </div>
                    <form method="post" class="book__form" >
          <table class="form-group">
         
          <tr>
            <td>
          <input name="name" type="text" placeholder="Enter Account Name" class="form-control" id="name" required>
          </td>  
          </tr>
          <tr>
          <td>
          <input name="email" type="email" placeholder="Enter Email" class="form-control" id="email" required>
          </td>
          </tr>
          <tr>
          <td>
          <input name="a_mobile" type="number" placeholder="Enter Mobile Number" class="form-control" id="number" required>
          </td>
          </tr>
          <tr>
          <td>
          <textarea name="upi_id" class="form-control" id="upi_id" rows="3" placeholder="Transaction ID" required></textarea>
          </td>
          </tr>
          <tr>
          <td>
          <input name="amount" type="number" placeholder="Amount" class="form-control" id="amount" pattern="[1-9]{1}[0-9]{9}" required> 
          </td>
          </tr>
          <tr>
          <td>
          <input name="date" type="date" placeholder="date" class="form-control" required id="date">
          </td>
          </tr>
          <tr>
          <td>
          <input name="time" type="time" placeholder="time" class="form-control" required id="time">
          </td>
          </tr>
          <tr>
          <td>
          <button class="btn btn-primary button" type="submit" name="save" value="Submit Details">Submit</button>
          <button class="btn btn-primary button" type="reset">Reset</button>
          </td>
          </tr>
          </table>
          <div class="qr">
      </form>
            </section>
          <section class="listings">
              
         
         
                <?php
						if(isset($_POST['save'])){
							include 'config.php';
							$a_name = $_POST['name'];
                            $email = $_POST['email'];
                            $a_mobile = $_POST['a_mobile'];
                            $id = $_POST['upi_id'];
                            $a_amount = $_POST['amount'];
                            $a_date = $_POST['date'];
                            $a_time = $_POST['time'];


							
							$qry = "INSERT INTO upi (a_name,email,a_mobile,id,a_amount,a_date,a_time) VALUES('$a_name','$email','$a_mobile','$id','$a_amount','$a_date','$a_time')";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Thank For paying. Wait for Admin Approval\");
											window.location = (\"approval.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
							}
						}
						
					  ?>
		
	</section>
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