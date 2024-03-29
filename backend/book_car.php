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
                <a href="#" class="nav__logo">SRJ RENTAL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="../index.html" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="login.php" class="nav__link">Login</a>
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
        <section class="book" id="cars">
        <section class="listings">
          <div class="wrapper">
              <ul class="properties_list">
              <?php
                          include 'config.php';
                          $sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
                          $rs = $con->query($sel);
                          $rws = $rs->fetch_assoc();

              ?>
                  <li>
                      <a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
                          <img class="car__img account__img" src="cars/img/<?php echo $rws['image'];?>" >
                      </a>
                      <span class="price"><?php echo '₹'.$rws['cost'];?>/Day</span>
                      <div class="property_details">
                          <h1>
                              <a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo $rws['car_name'];?></a>
                          </h1>
                          <h2> <span class="property_size"><?php echo $rws['car_type'];?><img src="cars/type.png" alt="" class="car__icon"></span></h2>
                          <h2> <span class="property_size"><?php echo $rws['capacity'];?>-Seater <img src="cars/seat.png" alt="" class="car__icon"></span> </h2>
                      </div>
                  </li>
                  <h3>Proceed to Hire <?php echo $rws['car_name'];?>. </h3>
				
    
                        
                    <form method="post" class="book__form" >
                    <h9 class="">Sign Up For Booking</h8>
					<table class="form-group">
                    <tr>
                      <td>
                    <input name="name" type="text" placeholder="Enter Name" class="form-control" id="name" required>
                    </td>  
                    </tr>
                    <tr>
                    <td>
                    <input name="email" type="email" placeholder="Enter email" class="form-control" id="email" required>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input name="password" type="password" placeholder="Enter Password" class="form-control" id="number" required>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input name="mobile" type="number" placeholder="Enter Mobile Number" class="form-control" id="number" required>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter Address" required></textarea>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input name="city" type="text" placeholder="Enter Pickup City" class="form-control" id="city" required>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input name="pincode" type="number" placeholder="Enter Pincode" class="form-control" maxlength="6" required id="pincode">
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <button class="btn btn-primary button" type="submit" name="save" value="Submit Details">Submit</button>
                    <button class="btn btn-primary button" type="reset">Reset</button>
                    
                    </td>
                    </tr>
                    
					</table>
                  
				</form>
                
    
			
				<?php
						if(isset($_POST['save'])){
							include 'config.php';
							$name = $_POST['name'];
							$email = $_POST['email'];
                            $password = $_POST['password'];
							$mobile = $_POST['mobile'];
							$address = $_POST['address'];
                            $city =$_POST['city'];
                            $pincode=$_POST['pincode'];
							
							$qry = "INSERT INTO client (name,email,password,mobile,address,city,pincode,car_id,status)
							VALUES('$name','$email','$password','$mobile','$address','$city','$pincode','$_GET[id]','pending')";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered. Proceed to Login\");
                                            window.location = (\"paylogin.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"book_car.php\")
											</script>";
							}
						}
						
					  ?>
                    
			</ul>
		</div>
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
                <script src="../assets/js/swiper-bundle.min.js"></script>

                <script src="../assets/js/main.js"></script>
            </body>
        </html>