<?php
	include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Panel</title>
		<!-- CSS Files-->
		<link rel="stylesheet" href="css_code/admin_panel.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>

	<body>
		<!--header section -->
		<header>
			<div class="container-fluid">
				<div class="header-content">
					<div class="side-head">
						<span class="text-white">Admin Panel</span>
					</div>
					<div class="header-nav">
						<ul>
							
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<div class="wrapper">
			<!--this is sidebar -->
			<section class="sidebar">
				<ul class="nav-bar">
					<li><a href="show_all_orders.php?action=show_orders">Orders</a></li>
					<li><a href="home_admin.php?action=view_product">View Products</a></li>
					<!--<li><a href="#">Products Management</a></li>-->
					<li><a href="home_admin.php?action=add_product">Add Products</a></li>
				</ul>
			</section>
			<!-- this is our working panel -->
			<!--<section class="working-panel">
				<div class="container-fluid">
					<h1 class="display-4">This is the Admin Panel</h1>
					<hr>

					
					<div class="all-order mt-5">
						<h2>All Orders</h2><hr>
						<table class="table table-bordered table-hover">
						  <thead>
						    <tr class="bg-primary text-white">
						      <th scope="col">#</th>
						      <th scope="col">Order No.</th>
						      <th scope="col">Ordered By</th>
						      <th scope="col">Order Quantity</th>
						      <th scope="col">Total Cost</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">1</th>
						      <td>Mark</td>
						      <td>Otto</td>
						      <td>@mdo</td>
						    </tr>
						    <tr>
						      <th scope="row">2</th>
						      <td>Jacob</td>
						      <td>Thornton</td>
						      <td>@fat</td>
						    </tr>
						    <tr>
						      <th scope="row">3</th>
						      <td colspan="2">Larry the Bird</td>
						      <td>@twitter</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</section>-->
			<div class="content">
				<div class="content_box">
					<?php
						if(isset($_GET['action'])){
							$action=$_GET['action'];
						}
						else{
							$action='';
						}
						switch ($action) {
							case 'add_product':
								include 'insert_products.php';
								break;
							case 'view_product':
								include 'view_products.php';
								break;
							case 'edit_product':
								include 'edit_product.php';
								break;
							case 'show_orders':
								include 'show_all_orders.php';
								break;
						}
					?>
				</div>
			</div>

		</div>



		<script src="Jquery/jquery-3.5.1.slim.min.js"></script>
	    <script src="Popper/popper.min.js"></script>
	    <script src="js/bootstrap.bundle.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>