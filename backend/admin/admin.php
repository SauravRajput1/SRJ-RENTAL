<?php
	session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

        <!--=============== BOOTSRAP CSS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="../../assets/css/styles.css" >

        <title>SRJ RENTAL</title>
    </head>
    <body>
    <header class="header" id="header">
            <nav class="nav container">
                <a href="adminaccount.php" class="nav__logo">SRJ RENTAL</a>

                <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item">
                            <a href="adminaccount.php" class="nav__link">Admin Panel</a>
                        </li>
                        <li class="nav__item">
                            <a href="../logout.php" class="nav__link">Logout</a>
                        </li>
                        
                    </ul>
                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
                </div>
            </nav>
        </header>
        <main class="main">
        <section class="book_section" id="book">
        <img src="../cars/bookhead.jpg" alt="car" class="book__img">
        <section class="section">
            <div class="container">
            <form method="post" class="book__form" >
                    <h9>Add Admin</h8>
					<table class="form-group">
                    <tr>
                      <td>
                    <input name="username" type="text" placeholder="Enter username" class="form-control" id="username" required>
                    </td>  
                    </tr>
                    <tr>
                    <td>
                    <input name="password" type="password" placeholder="Enter Password" class="form-control" id="password" maxlength="6" required>
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
							include '../config.php';
							$username = $_POST['username'];
                            $password = $_POST['password'];
							
							$qry = "INSERT INTO admin (username,password)
							VALUES('$username','$password')";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered.\");
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											</script>";
							}
						};
						
					  ?>
          <?php
						if(isset($_GET['delete'])){
							include '../config.php';
							$username = $_GET['username'];
							$qry= "DELETE FROM `admin` WHERE username='$username'";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Deleted\");
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Failed. Try Again\");
											</script>";
							}
						}
						
					  ?>
          
                <?php
                            include '../config.php';
                            $sel = "SELECT * FROM admin";
                            $rs = $con->query($sel);
                ?>     
                    <br>
                    <table class="table table-hover">
                    <tr>
                    <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Password</th>
                    </tr>
                    </thead>

                    <?php
                    while($rws = $rs->fetch_assoc()) 
                    {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $rws['id'];?></th>
                    <td><?php echo $rws['username'];?></td>
                    <td><?php echo $rws['password']; ?></td>
                    </tr>
                    <?php } ?>
                    </table>
                    <form method="get" class="book__form" >
                    <h9 class="">Remove Admin</h9>
					<table class="form-group">
                    <tr>
                      <td>
                    <input name="username" type="text" placeholder="Enter username" class="form-control" id="username" required>
                    </td>  
                    </tr>
                    <tr>
                    <td>
                    <button class="btn btn-primary button" type="submit" name="delete" value="delete">Submit</button>
                    <button class="btn btn-primary button" type="reset">Reset</button>
                    </td>
                    </tr>
					</table>
				</form>
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
                <script src="../../assets/js/swiper-bundle.min.js"></script>

                <script src="../../assets/js/main.js"></script>
            </body>
        </html>