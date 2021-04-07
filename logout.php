<?php
	session_start();
	include('connection.php');
	//$delete_name= "DELETE FROM session WHERE user_name='$_SESSION[user_name]'";
    //$delete_name2=mysqli_query($conn,$delete_name);
	session_destroy();
	$get_cart=mysqli_query($conn,"SELECT * FROM cart1");
    while($row=mysqli_fetch_array($get_cart)){
        $run_remove=mysqli_query($conn,"DELETE FROM cart1 WHERE product_id='$row[product_id]' ");
    }
    $get_cart1=mysqli_query($conn,"SELECT * FROM cart");
    while($row=mysqli_fetch_array($get_cart)){
        $run_remove=mysqli_query($conn,"DELETE FROM cart WHERE product_id='$row[product_id]' ");
    }
    


	echo "<script>window.open('login.php','_self')</script>";
?>