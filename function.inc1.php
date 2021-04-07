<?php
	include('connection.php');

	function cart(){
		global $conn;

		if(isset($_GET['add_cart'])){
            $product_id =$_GET['add_cart'];

            $ip=get_ip();
            $run_check_product=mysqli_query($conn,"SELECT * FROM cart1 WHERE product_id='$product_id'");

           if(mysqli_num_rows($run_check_product) >0){
            	//echo "WHY";
            }
            else{
                $fetch_product=mysqli_query($conn,"SELECT * FROM products WHERE product_id='$product_id'");
                $fetch_product=mysqli_fetch_array($fetch_product);
                $product_name=$fetch_product['product_name'];
                $run_insert_product = mysqli_query($conn, "INSERT INTO cart1 (product_id,product_name,ip_address,product_quantity) values ('$product_id', '$product_name','$ip','') ");

                echo "<script>window.open('home_user1.php','_self')</script>";

                        
            }
        }
	}

	function total_price(){
		global $conn;
		$total=0;
		$ip=get_ip();
		$run_cart=mysqli_query($conn,"SELECT * FROM cart1 where ip_address ='$ip' ");
		while($fetch_cart=mysqli_fetch_array($run_cart)){
			$product_id = $fetch_cart['product_id'];
			$result_product=mysqli_query($conn, "SELECT * FROM products where product_id ='$product_id' ");
			while($fetch_product=mysqli_fetch_array($result_product)){
				$product_price=array($fetch_product['product_price']);

				$product_name=$fetch_product['product_name'];
				$product_image=$fetch_product['product_image'];
				$sing_price= $fetch_product['product_price'];

				$values=array_sum($product_price);

				$total+=$values;
			}
		}
		echo "$".$total;
	}

	function total_items(){
		global $conn;
		$ip= get_ip();

        $run_items=mysqli_query($conn,"SELECT * FROM cart1 where ip_address='$ip' ");
        echo $count_items=mysqli_num_rows($run_items);
	}
	function pr($arr){
		echo '<pre>';
		print_r($arr);
	}

	function prx($arr){
		echo '<prr>';
		print_r($arr);
		die();
	}
	function get_safe_value($str){
		if($str!=''){
			return mysqli_real_escape_string($conn,$str);
		}
		
	}
	function get_ip(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
?>