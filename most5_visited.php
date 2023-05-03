<?php
	include('connect.php');
	include('tracking_logic.php');
	include('prod_tracking_logic.php');
	// store_visited_pages("Shop");


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

			<!--Tracking Popup-->
			<div class="modal fade" id="producttrackingModal" role="dialog" style="z-index:10000;">
			<div class="modal-dialog">
    
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="display: unset;text-align: center;">
				<button type="button" class="close btn btn-primary d-flex" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tracking System</h4>
				</div>
				<div class="modal-body" style="overflow:none;">
				<iframe src="prod_tracking.php" style="width: 470px;height: 470px;"></iframe>
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
						<li><a class="nav-link" href="user.php">User</a></li>
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
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Most five visited products</h1>
							</div>
							<div class="">
                				<!-- <a href="product_insert.php" class="btn btn-primary-hover-outline">Insert Product</a> -->
								<!-- <li class="d-flex justify-content-end"> -->
								<!-- <a class="btn btn-primary-hover-outline" href="#" data-toggle="modal" data-target="#producttrackingModal">Visited Product Tracking</a> -->
								<!-- </li> -->
								<!-- <a href="most5_visited.php" class="btn btn-primary-hover-outline">Most five visited products</a> -->
            				</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->


		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					<?php
						$select_query = "SELECT * FROM `products`";
						$result_query = mysqli_query($connection, $select_query);
						// print_r($_COOKIE['VISITED_PRODUCT_ID']);
                        if(isset($_COOKIE['VISITED_PRODUCT_ID'])) {
                            $product_visited = $_COOKIE['VISITED_PRODUCT_ID'];
                            $product_visited_array = json_decode($product_visited, true);
                            arsort($product_visited_array);
                            // $product_visited_encode = json_encode($product_visited_array);
                            // print_r($product_visited_array);
                            $output = array_slice($product_visited_array, 0, 5, true);
                            
                            // print_r($output);
                            // $retval = mysqli_query($connection, $sql);

                            // echo $row['product_name'];
                            while($row = mysqli_fetch_assoc($result_query)) {

                                if(array_key_exists($row['prodcut_id'], $output)) {
                                    $product_id = $row['prodcut_id'];
                                    $product_name = $row['product_name'];
                                    $product_price = $row['product_price'];
                                    $product_image = $row['product_image'];
                                    $product_description = $row['product_description'];
                                    echo "<div class='col-12 col-md-4 col-lg-3 mb-5'>
                                    <a class='product-item' href='product1.php?product_id=$product_id&product_name=$product_name'>
                                        <img src='images/$product_image' class='img-fluid product-thumbnail'>
                                        <h3 class='product-title'>$product_name</h3>
                                        <strong class='product-price'>$$product_price</strong>
            
                                        <a href='shop.php?add_to_cart=$product_id' class='btn btn-primary-hover-outline mt-2'>Add</a>
                                    </a>
                                </div> ";
                                }
                            }
                        }
					?>

		      		<!-- Start Column 1 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="product1.php">
							<img src="images/product-3.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Nordic Chair</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>  -->
					<!-- End Column 1 -->

					<!-- Start Column -->

					<!-- End Column -->
						
					<!-- Start Column 2 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="product2.php">
						<input type="hidden" name="current_product" value="Ergonomic Chair">
							<img src="images/product-1.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Ergonomic Chair</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>  -->
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-2.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Kruzo Aero Chair</h3>
							<strong class="product-price">$78.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> -->
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-3.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Ergonomic Chair</h3>
							<strong class="product-price">$43.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> -->
					<!-- End Column 4 -->


					<!-- Start Column 1 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-3.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Nordic Chair</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>  -->
					<!-- End Column 1 -->
						
					<!-- Start Column 2 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-1.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Nordic Chair</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>  -->
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-2.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Kruzo Aero Chair</h3>
							<strong class="product-price">$78.00</strong>

							<span class="icon-cross">
								<button class="addtocart">+</button>
							</span>
						</a>
					</div> -->
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/product-3.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Ergonomic Chair</h3>
							<strong class="product-price">$43.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> -->
					<!-- End Column 4 -->

		      	</div>
		    </div>
		</div>


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
