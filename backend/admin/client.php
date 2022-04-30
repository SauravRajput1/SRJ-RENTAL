<?php
	session_start();
?>
<?php
						if(isset($_POST['save'])){
							include '../config.php';
							$client_id = $_POST['client_id'];
                            $status = $_POST['status'];
                            $upi_status = $_POST['upi_status'];
							
							$qry = "UPDATE `client` SET `status` = '$status' , `upi_status`='$upi_status' WHERE `client_id` = '$client_id'";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully updated.\");
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Updation Failed. Try Again\");
											</script>";
							}
						};
						
					  ?>
                       <?php
						if(isset($_GET['delete'])){
							include '../config.php';
							$client_id = $_GET['client_id'];
							$qry= "DELETE FROM `client` WHERE client_id='$client_id'";
							$result = $con->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Deleted\");
                                            window.location = (\"client.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Failed. Try Again\");
                                            Window.location = (\"client.php\")
											</script>";
							}
						}
						
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
            <?php
                            include '../config.php';
                            $sel = "SELECT * FROM client";
                            $rs = $con->query($sel);
                ?>     
                    <br>
                    <h2>Personal Details</h2>
                    <table class="table table-hover">
                    <tr>
                    <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">pincode</th>
                    </tr>
                    </thead>
                    <?php
                    while($rws = $rs->fetch_assoc()) 
                    {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $rws['client_id'];?></th>
                    <td><?php echo $rws['name'];?></td>
                    <td><?php echo $rws['email']; ?></td>
                    <td><?php echo $rws['password']; ?></td>
                    <td><?php echo $rws['mobile']; ?></td>
                    <td><?php echo $rws['address']; ?></td>
                    <td><?php echo $rws['city']; ?></td>
                    <td><?php echo $rws['pincode']; ?></td>
                    </tr>
                    <?php } ?>
                    </table>
                    <?php
                            include '../config.php';
                            $sel = "SELECT *,(return_date-pickup_date) AS days FROM client  INNER JOIN cars on cars.car_id = client.car_id";
                            $rs = $con->query($sel);
                    ?>     
                    <br>
                    <h2>Car Details</h2>
                    <table class="table table-hover">
                    <tr>
                    <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Car Id</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Car Type</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Car Capacity</th>
                    <th scope="col">Car Cost/Per Day</th>
                    </tr>
                    </thead>
                    <?php
                    while($rws = $rs->fetch_assoc()) 
                    {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $rws['client_id'];?></th>
                    <td><?php echo $rws['car_id'];?></td>
                    <td><?php echo $rws['car_name']; ?></td>
                    <td><?php echo $rws['car_type']; ?></td>
                    <td><?php echo $rws['car_name']; ?></td>
                    <td><?php echo $rws['capacity']; ?></td>
                    <td>&#8377;<?php echo $rws['cost']; ?></td>
                    </tr>
                    <?php } ?>
                    </table>
                    <?php
                            include '../config.php';
                            $sel = "SELECT *,(return_date-pickup_date) AS days FROM client  INNER JOIN cars on cars.car_id = client.car_id";
                            $rs = $con->query($sel);
                    ?>    
                    <br>
                    <h2>Booking Details</h2>
                    <table class="table table-hover">
                    <tr>
                    <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Pickup Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Total Days</th>
                    <th scope="col">Upi Id</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Upi Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Status</th>
                    </tr>
                    </thead>
                    <?php
                    while($rws = $rs->fetch_assoc()) 
                    {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $rws['client_id'];?></th>
                    <td><?php echo $rws['pickup_date'];?></td>
                    <td><?php echo $rws['return_date']; ?></td>
                    <td><?php echo $rws['days']; ?></td>
                    <td><?php echo $rws['upi_id']; ?></td>
                    <td>&#8377;<?php echo $rws['amount']; ?></td>
                    <td><?php echo $rws['upi_date']; ?></td>
                    <td><?php echo $rws['status']; ?></td>
                    <td><?php echo $rws['upi_status']; ?></td>
                    </tr>
                    <?php } ?>
                    </table>
                    <h2>Change Status/Remove</h2>
                    <form method="post" class="book__form" >
                    <h4>STATUS</h4>
                    <div class="form-group">
                    <label>Client Id</label>
                    <input name="client_id" type="number" placeholder="Enter Client Id" class="form-control" id="client_id" required>
                    </div>      
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status" name="status">
                        <option>approve</option>
                        <option>pending</option>
                        <option>cancel</option>
                        </select>
                    </div>       
                    <div class="form-group">
                        <label>Payment Status</label>
                        <select class="form-control" id="upi_status" name="upi_status">
                        <option>verified</option>
                        <option>Notverified</option>
                        <option>Not Paid</option>
                        </select>
                    </div>     
                    <button class="btn btn-primary button" type="submit" name="save" value="Submit Details">Submit</button>
				</form>
				
                    <form method="get" class="book__form" >
                    <h4 >Remove Client</h4>
					<table class="form-group">
                    <tr>
                      <td>
                    <input name="client_id" type="number" placeholder="Enter client Id" class="form-control" id="client_id" required>
                    </td>  
                    </tr>
                    <tr>
                    <td>
                    <button class="btn btn-primary button" type="submit" name="delete" value="delete">Submit</button>
                    </td>
                    </tr>
					</table>
				</form>
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