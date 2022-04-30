<?php
include '../config.php';
$sel = "SELECT * FROM cars WHERE car_id=" .$_GET["car_id"] . "";
$rs = $con->query($sel);
$rws = $rs->fetch_assoc()
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
                <a href="../../index.html" class="nav__logo">SRJ RENTAL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="../../index.html" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="adminaccount.php" class="nav__link">Admin Panel</a>
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
        <img src="../cars/bookhead.jpg" alt="car" class="book__img">
        <section class="section">
            <div class="container">
                    <h2>Edit Car_Id-<?php echo $rws['car_id'] ?></h2>
                    <form method="post" class="Car_form" >
                    <div class="form-group">
                    <label>Car Name</label>
                    <input name="car_name" type="text" placeholder="Enter Car Name" class="form-control" value="<?php echo $rws['car_name']; ?>" required>
                    </div>      
                    <div class="form-group">
                    <label>Car Type</label>
                    <input name="car_type" type="text" placeholder="Enter Car Type" class="form-control" value="<?php echo $rws['car_type']; ?>"  required> 
                    </div>       
                    <div class="form-group">
                    <label>Car Image</label>
                    <input type="text" name="image" id="image" class="form-control" value="<?php echo $rws['image']; ?>"  required> 
                    </div>  
                    <div class="form-group">
                    <label>Car cost</label>
                    <input name="cost" type="number" placeholder="Enter Cost &#8377;" class="form-control" value="<?php echo $rws['cost']; ?>"  required> 
                    </div> 
                    <div class="form-group">
                    <label>Capacity</label>
                    <input name="capacity" type="number" placeholder="Enter Capacity" class="form-control" id="capacity" maxlength="1" value="<?php echo $rws['capacity']; ?>" required> 
                    </div> 
                    <div class="form-group">
                    <label>Car_status</label>
                    <input name="car_status" type="text" placeholder="Enter Car Status" class="form-control" id="car_status" value="<?php echo $rws['car_status']; ?>" required> 
                    </div>

                    <button class="btn btn-primary button" type="submit" name="update" value="Edit Details">Edit</button>
                    </form>   
            
                    <?php
                        
                        include '../config.php';
						if(isset($_POST['update'])){
								$image = $_POST['image'];
								$car_name = $_POST['car_name'];
								$car_type = $_POST['car_type'];
								$cost = $_POST['cost'];
								$capacity = $_POST['capacity'];
                                $car_status = $_POST['car_status'];
                                $qry = "UPDATE `cars` SET `image` = '$image' , `car_name`='$car_name', `car_type`= '$car_type' , `cost`= '$cost' , `capacity`='$capacity' , `car_status`='$car_status' WHERE car_id = '$_GET[car_id]'";
								$res = $con->query($qry);
								if($res == TRUE){
                                    echo "<script type = \"text/javascript\">
                                                alert(\"Update Sucessfully\");
                                                window.location = (\"admincar.php\")
                                                </script>";
                                } else{
                                    echo "<script type = \"text/javascript\">
                                                alert(\"Failed. Try Again\");
                                                </script>";
                                }
                            }
                            
						
					?>
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
                <script src="../../assets/js/swiper-bundle.min.js"></script>
                
                <script src="../../assets/js/main.js"></script>
            </body>
        </html>