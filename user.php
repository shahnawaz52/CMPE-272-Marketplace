<?php
	include('tracking_logic.php');
	store_visited_pages("User");
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<title>Furni</title>
	</head>

	<body>

				<!--Tracking Popup-->
				<div class="modal fade" id="trackingModal" role="dialog" style="z-index:10000;">
			<div class="modal-dialog">
    
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="display: unset;text-align: center;">
				<button type="button" class="close btn btn-primary d-flex" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tracking System</h4>
				</div>
				<div class="modal-body" style="overflow:none;">
				<iframe src="tracking.php" style="width: 470px;height: 470px;"></iframe>
				</div>
			</div>
			
			</div>
		</div>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.php">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li><a class="nav-link" href="shop.php">Shop</a></li>
						<li><a class="nav-link" href="about.php">About us</a></li>
						<li><a class="nav-link" href="services.php">Services</a></li>
						<li><a class="nav-link" href="blog.php">Blog</a></li>
						<li><a class="nav-link" href="contact.php">Contact us</a></li>
                        <li class="active"><a class="nav-link" href="user.php">User</a></li>
						<li><a class="nav-link" href="userlist.php">User List</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="login.php"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
						<li>
							<a class="nav-link" href="#" data-toggle="modal" data-target="#trackingModal">Page Tracking</a>
						</li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
        <form method="post" action="">
            <div class="row container">
                <h2 class="mt-2 section-title">New User</h2>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="home_address">Home Address</label>
                        <input type="text" class="form-control" id="home_address" name="home_address">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="home_phone">Home phone</label>
                        <input type="number" class="form-control" id="home_phone" name="home_phone">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-black" for="cell_phone">Cell Phone</label>
                        <input type="number" class="form-control" id="cell_phone" name="cell_phone">
                    </div>
                </div>
            </div>
            <div class="mx-5 mb-5">
                <button type="submit" class="btn btn-primary-hover-outline mt-4" name="register">Register</button>
            </div>
		</form>
		<form method="GET" action="">
            <div class="form-group mb-5 container row">
                <h2 class="mt-2 section-title">Search User</h2>
                <label class="text-black" for="search">Search</label>
                <input type="search" class="form-control" id="cell" name="search_query">
            </div>
            <div class="mx-5">
                <button type="submit" class="btn btn-primary-hover-outline ml-3" name="search">Search</button>
            </div>
        </form>
		<!-- End Why Choose Us Section -->

        <?php
			include('connect.php');


			// Insert User in database
			if(isset($_POST['register'])) {
				$firstname = $_POST['first_name'];
				$lastname = $_POST['last_name'];
				$email = $_POST['email'];
				$homeaddress = $_POST['home_address'];
				$homephone = $_POST['home_phone'];
				$cellphone = $_POST['cell_phone'];

				$s_query = "SELECT * FROM users WHERE email='$email'";
				$result = mysqli_query($connection, $s_query);
				$row_count = mysqli_num_rows($result);
				// if($row_count > 0) {
				// 	echo "<script>alert('Email already exist try different one!')</script>";
				// } else {
				if(empty($firstname)) {
					echo "<script>alert('Please enter first name!')</script>";
				} elseif(empty($lastname)) {
					echo "<script>alert('Please enter last name!')</script>";
				} elseif(empty($email)) {
					echo "<script>alert('Please enter email address!')</script>";
				} elseif(empty($homeaddress)) {
					echo "<script>alert('Please enter home address!')</script>";
				} elseif(empty($homephone) && empty($cellphone)) {
					echo "<script>alert('Please enter at least one phone number!')</script>";
				} else {
					if($row_count > 0) {
						echo "<script>alert('Email already exist try different one!')</script>";
					} else {
						$insert_query = "INSERT INTO `users` (first_name, last_name, email, home_address, home_phone, cell_phone)
						VALUES ('$firstname', '$lastname', '$email', '$homeaddress', '$homephone', '$cellphone')";

						$sql_execute = mysqli_query($connection, $insert_query);
						if($sql_execute) {
							echo "<script>alert('Successfully added $firstname $lastname!!')</script>";
						   } else {
							echo($insert_query ."<br>" .mysqli_connect_error($connection));
						   }
					}
				}
				// }


				// if($sql_execute) {
				// 	echo "<script>alert('Data Insert Successfully!')</script>";
				// } else {
				// 	die(mysqli_connect_error($connection));
				// }
				// if($sql_execute) {
				//  echo "<script>alert('Successfully added $firstname $lastname!!')</script>";
				// } else {
				//  echo($insert_query ."<br>" .mysqli_connect_error($connection));
				// }
			}

			// Retrieve search query from URL parameter
			if(isset($_GET['search_query'])) {
				$search_query = $_GET['search_query'];
				if(empty($search_query)) {
					echo "<script>alert('Please enter a name or email or phone to search for!')</script>";
				} else {
			
					// Query database for matching users
					$search_query = mysqli_real_escape_string($connection, $search_query);
					$search_query = "%$search_query%"; // Add wildcard characters to enable partial matches
					$search_query = strtolower($search_query); // Convert search query to lowercase for case-insensitive search
				
					$search_results = mysqli_query($connection, "SELECT * FROM users WHERE LOWER(first_name) LIKE '$search_query' OR LOWER(last_name) LIKE '$search_query' OR LOWER(email) LIKE '$search_query' OR home_phone LIKE '$search_query' OR cell_phone LIKE '$search_query'");
				
					// Display search results
					if(mysqli_num_rows($search_results) > 0) {
						echo "<h3>Search Results:</h3>";
						echo "<table class='table'>";
						echo "<thead class='thead-dark'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr></thead>";
						while($row = mysqli_fetch_assoc($search_results)) {
							echo "<tr>";
							echo "<td>".$row['first_name']."</td>";
							echo "<td>".$row['last_name']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "<td>".$row['home_address']."</td>";
							echo "<td>".$row['home_phone']."</td>";
							echo "<td>".$row['cell_phone']."</td>";
							echo "</tr>";
						}
						echo "</table>";
					} else {
						echo "<p>No results found.</p>";
					}
				}
			}

			// select all users from the database
			// $select_query = "SELECT * FROM users";
			// $result = mysqli_query($connection, $select_query);

			// // display the users in an HTML table
			// echo "<table class='table'>";
			// echo "<thead class='thead-dark'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr></thead>";
			// while($row = mysqli_fetch_assoc($result)) {
			// 	echo "<tr>";
			// 	echo "<td>".$row['first_name']."</td>";
			// 	echo "<td>".$row['last_name']."</td>";
			// 	echo "<td>".$row['email']."</td>";
			// 	echo "<td>".$row['home_address']."</td>";
			// 	echo "<td>".$row['home_phone']."</td>";
			// 	echo "<td>".$row['cell_phone']."</td>";
			// 	echo "</tr>";
			// }
			// echo "</table>";
						
    	?>

		<!-- Start Team Section -->
		<div class="untree_co-section">
			<div class="container">

				<div class="row mb-5">
					<div class="col-lg-5 mx-auto text-center">
						<h2 class="section-title">Our Team</h2>
					</div>
				</div>

				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="images/person_1.jpg" class="img-fluid mb-5">
						<h3 clas><a href="#"><span class="">Lawson</span> Arnold</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="images/person_2.jpg" class="img-fluid mb-5">

						<h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="images/person_3.jpg" class="img-fluid mb-5">
						<h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
					</div> 
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="images/person_4.jpg" class="img-fluid mb-5">

						<h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

          
					</div> 
					<!-- End Column 4 -->

					

				</div>
			</div>
		</div>
		<!-- End Team Section -->

		

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section before-footer-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</body>

</html>
