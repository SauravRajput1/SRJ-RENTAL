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
                            <a href="account.php" class="nav__link">Account</a>
                        </li>
                        <li class="nav__item">
                            <a href="logout.php" class="nav__link">Logout</a>
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
        <main class="main">
        <section class="book_section" id="book">
        <img src="cars/bookhead.jpg" alt="car" class="book__img">
        <section class="about section" id="about">
        <h1 class="section__title  text-center">Welcome <?php echo $rws['name'] ?></h1>
                <div class="about__container container grid">
                    <div class="about__data">
                    

                        <h2 class="section__title about__title">UPI Transaction</h2>
                        
                        <img src="cars/upi.jpg" alt="" class="qr__img">
                    </div>
                    <form method="post" class="book__form" >
                    <div class="form-row">
            <div class="form-group col-md-6">
            <label for="pickup" class="form-label">Pickup Date</label>
            <input name="p_date" type="date" placeholder="pickup-date" class="form-control" id="p_date" required >
            </div>
            <div class="form-group col-md-6">
            <label for="drop" class="form-label">Return Date</label>
            <input name="r_date" type="date" placeholder="pickup-date" class="form-control"  id="r_date" required> 
            </div>
            <button type="submit" class="btn btn-primary button" onclick="check()">Submit</button>
            </div>
            <div class="form-group">
            <label for="date" class="form-label">Total Cost &#8377;</label>
            <input type="text" name="amount"  placeholder="Amount" class="form-control" id="amount" value="Select Your Ride Date" readonly> 
            </div>
         
          <table class="form-group">
          <tr>
          <td>
          <label for="date" class="form-label">Upi Id</label>
          <input type="text" name="upi_id" placeholder="UPI ID" class="form-control" id="upi_id" required>
          </td>
          </tr>
          <tr>
          <td>
          <label for="date" class="form-label">Transaction Date</label>
          <input  type="date" name="upi_date"  class="form-control" required id="upi_date">
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
                            $pickup_date = $_POST['p_date'];
                            $return_date = $_POST['r_date'];
                            $upi_id = $_POST['upi_id'];
                            $amount = $_POST['amount'];
                            $upi_date = $_POST['upi_date'];

							
							$qry = "UPDATE `client` SET `pickup_date` = '$pickup_date' , `return_date`='$return_date', `upi_id`= '$upi_id' , `amount`= '$amount' , `upi_date`='$upi_date' , `upi_status`='notverified' WHERE email = '$_SESSION[email]'";
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
                <script>
                function check() {
                var date1 = new Date(document.getElementById('p_date').value);
                var date2 = new Date(document.getElementById('r_date').value);
                var diff = Math.abs(date2.getTime() - date1.getTime());
                var noofdays = Math.ceil(diff / (1000 * 3600 * 24));  
                if(date1  >= date2){ 
                    alert("return date should after Pickup date")
                }
                else {
                    var amount = noofdays*<?php echo $rws['cost'];?>;
                    document.getElementById("amount").value = amount;
                }
                }		
                </script>
            </body>
        </html>