<?php
	include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" href="css_code/admin_panel.css">
</head>
<body bgcolor="skyblue">
	<?php
		$edit_product=mysqli_query($conn,"SELECT * FROM products where product_id='$_GET[product_id]' ");
		$fetch_edit = mysqli_fetch_array($edit_product);
	?>
	<div class="form_box">
		<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="100%">
				<tr>
					<td colspan="7">
						<h2>Edit Product</h2>
						<div class="border_bottom"></div>
					</td>
				</tr>

				<tr>
					<td>
						<b>Product Title:</b>
					</td>
					<td><input type="text" name="product_name" value= "<?php echo $fetch_edit['product_name']; ?>" size="60" required/></td>
				</tr>

				
				<tr>
					<td valign="top">
						<b>Product Image: </b>
					</td>
					<td>
						<input type="file" name="product_image" />
						<div class="edit_image">
							<img src="product_images/<?php echo $fetch_edit['product_image']; ?>" width="100" height="70" />
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<b>Product Price: </b>
					</td>
					<td>
						<input type="text" name="product_price" value="<?php echo $fetch_edit['product_price']; ?> " />
					</td>
				</tr>

				<tr>
					<td valign="top">
						<b>Product Description:</b>
					</td>
					<td>
						<textarea name="product_description" rows="10"><?php echo $fetch_edit['product_description']; ?></textarea>
					</td>
				</tr>

				<tr>
					<td></td>
					<td colspan="7">
						<input type="submit" name="edit_product" value="Save">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['edit_product'])){
		$product_name=trim(mysqli_real_escape_string($conn,$_POST['product_name']));
		$product_price=$_POST['product_price'];
		$product_description=trim(mysqli_real_escape_string($conn,$_POST['product_description']));

		// Getting the image from the field
		$product_image= $_FILES['product_image']['name'];
		$product_image_tmp =$_FILES['product_image']['tmp_name'];

		if(!empty($_FILES['product_image']['name'])){
			if(move_uploaded_file($product_image_tmp, "product_images/$product_image")){
				$update_product = mysqli_query($conn,"UPDATE products SET  product_name='$product_name', product_price='$product_price', product_description= '$product_description', product_image='$product_image' where product_id='$_GET[product_id]' ");
			}
		}
		else{
			$update_product = mysqli_query($conn,"UPDATE products SET  product_name='$product_name', product_price='$product_price', product_description= '$product_description' where product_id='$_GET[product_id]' ");
		}

		if($update_product){
			echo "<script>alert('Product was updated successfully!')</script>";
			echo "<script>window.open(window.location.href,'_self')</script>";
		}

		

	}
?>