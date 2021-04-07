<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<link rel="stylesheet" href="css_code/admin_panel.css">
</head>
<body>
	<div class="view_product_box">
		<!--<h2>View Products</h2>-->
		<div class="border_bottom"></div>
		<form action="" method="post" enctype="multipart/form-data">
			<!--<table width="100%">
				<thead>
					<tr align="center">
						<th><input type="checkbox" id="checkAll"/>Check</th>
						<th>ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Product Image</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="checkbox" name="deleteAll[]" value="" /></td>
						<td>ID</td>
						<td>Product Name</td>
						<td>Price</td>
						<td>Product Image</td>
						<td>Delete</td>
						<td>Edit</td>

					</tr>
				</tbody>
			</table>-->
			<section class="working-panel">
				<div class="container-fluid">
					<h1 class="display-4">View Products</h1>
					<hr>

					
					<div class="all-order mt-5">
						<!--<h2>All Orders</h2><hr>-->
						<table class="table table-bordered table-hover">
						  <thead>
						    <tr class="bg-primary text-white">
						      <th scope="col"><input type="checkbox" id="checkAll"/>Check</th>
						      <th scope="col">ID</th>
						      <th scope="col">Product Name</th>
						      <th scope="col">Price</th>
						      <th scope="col">Product Image</th>
						      <th scope="col">Delete</th>
						      <th scope="col">Edit</th>
						    </tr>
						  </thead>
						  <?php
						  	$all_products = mysqli_query($conn,"SELECT * FROM products order by product_id DESC");
						  	$i=1;
						  	while($row=mysqli_fetch_array($all_products)){
						  ?>
						  <tbody>
						    <tr>
						      <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['product_id']; ?>" /></td>
							  <td><?php echo $i; ?></td>
							  <td><?php echo $row['product_name']; ?></td>
							  <td><?php echo $row['product_price']?></td>
							  <td><img src="product_images/<?php echo $row['product_image']; ?>" width="70" height="50" /></td>
							  <td><a href="home_admin.php?action=view_product&delete_product=<?php echo $row['product_id']; ?>">Delete</a></td>
							  <td><a href="home_admin.php?action=edit_product&product_id=<?php echo $row['product_id']; ?>">Edit</a></td>
							 </tr>
						    
						  </tbody>
						  <?php $i++;} //End while loop ?>
						  <tr>
						  	<td><input type="submit" name="delete_all" value="Remove" /></td>
						  </tr>
						</table>
					</div>
				</div>
			</section>
		</form>
	</div>
	<?php
		//Delete Product
		if(isset($_GET['delete_product'])){
			$delete_product=mysqli_query($conn,"DELETE FROM products where product_id='$_GET[delete_product]' ");
			if($delete_product){
				echo "<script>alert('Product has been deleted successfully!')</script>";
				echo "<script>window.open('home_admin.php?action=view_product','_self')</script>";
			}
		}
		//Remove items selected using foreach loop
		if(isset($_POST['deleteAll'])){
			$remove=$_POST['deleteAll'];

			foreach($remove as $key){
				$run_remove=mysqli_query($conn,"DELETE FROM products WHERE product_id='$key'");
				$run_remove1=mysqli_query($conn,"DELETE FROM cart WHERE product_id='$key'");
				echo "<script>alert('Items selected has been removed successfully!')</script>";
				echo "<script>window.open('home_admin.php?action=view_product','_self')</script>";
			}

		}

	?>
</body>
</html>