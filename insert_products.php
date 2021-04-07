<?php
	include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" href="css_code/admin_panel.css">
</head>
<body>
	<div class="form_box">
		<form action="insert_products.php" method="post" enctype="multipart/form-data">
			<table align="center" width="100%">
				<tr>
					<td colspan="7">
						<h2>Add Product</h2>
						<div class="border_bottom"></div>
					</td>
				</tr>

				<tr>
					<td>
						<b>Product Title:</b>
					</td>
					<td><input type="text" name="product_name" size="60" required/></td>
				</tr>

				
				<tr>
					<td>
						<b>Product Image: </b>
					</td>
					<td>
						<input type="file" name="product_image" />
					</td>
				</tr>
				<tr>
					<td>
						<b>Product Price: </b>
					</td>
					<td>
						<input type="text" name="product_price">
					</td>
				</tr>

				<tr>
					<td align="top">
						<b>Product Description:</b>
					</td>
					<td>
						<textarea name="product_description" rows="10"></textarea>
					</td>
				</tr>

				<tr>
					<td></td>
					<td colspan="7">
						<input type="submit" name="insert_post" value="Add Product">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['insert_post'])){
		$product_name=$_POST['product_name'];
		$product_price=$_POST['product_price'];
		$product_description=trim(mysqli_real_escape_string($conn,$_POST['product_description']));

		// Getting the image from the field
		$product_image= $_FILES['product_image']['name'];
		$product_image_tmp =$_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp, "product_images/$product_image");

		$insert_product = "insert into products (product_name, product_price, product_description, product_image) values ('$product_name', '$product_price', '$product_description', '$product_image')";
		$insert_pro= mysqli_query($conn, $insert_product);

		if($insert_pro){
			echo "<script>alert('Prodcut Has been inserted successfully!')</script>";

			echo "<script>window.open('home_admin.php?action=add_product','_self')</script>";
		}

	}
?>