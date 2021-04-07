<?php
    //include('connection.php');
    include('function.inc.php');
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="css_code/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid bg-dark header-top d-none d-md-block">
            <div class="container">
                <div class="row text-light pt-2 pb-2">
                    <div class="col-md-5">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>Online Shopping.com
                    </div>
                    <div class="col-md-3">
                       
                    </div>
                    <div class="col-md-4">
                        My Cart - <?php total_price(); ?> 
                            <button class="btn btn-success">
                                Cart
                                <span class="badge badge-pill badge-danger">
                                    <?php 
                                        $get_product ="SELECT * FROM products";
                                        $run_product = mysqli_query($conn, $get_product);
                                        $check_product=mysqli_num_rows($run_product);
                                        if($check_product==0){
                                            echo "0";
                                        }
                                        else{
                                            total_items(); 
                                        }
                                        
                                    ?>
                                </span>
                            </button>
                    </div>
                </div>
            </div>
            <div id="content_area">
                
            </div>
        </div>
        <div class="container-fluid bg-black">
            <nav class="container navbar navbar-expand-lg navbar-dark bg-black">
                <!--<a class="navb ar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-lable="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home_user2.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart2.php">Shopping Cart<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="search1.php" method="get">
                        <input class="form-control mr-sm-2" name= "search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="content_wrapper">
            <div id="content_area"> 
                <div class="shopping_cart_container">
                    <div id="shopping_cart" align="center" style="padding: 15px">
                                <?php
                                    //if(isset($_SESSION['user_name'])){
                                        //echo "<b>Your User Name:</b>" . $_SESSION['user_name'];
                                    //}
                                    //else{
                                       // echo "";
                                    //}
                                ?>
                                <b style="color:navy">Your Cart - </b> Total Items: <?php $get_product ="SELECT * FROM products";
                                        $run_product = mysqli_query($conn, $get_product);
                                        $check_product=mysqli_num_rows($run_product);
                                        if($check_product==0){
                                            echo "0";
                                        }
                                        else{
                                            total_items(); 
                                        }; ?> Total Price: <?php total_price() ?>
                    </div>
                    <form action="" method="post" enctype="multiple/form-data">
                        <table align="center" width="100%">
                            <tr align="center">
                                <th>Remove</th>
                                <th>Product</th>
                                <!--<th>Quantity</th>-->
                                <th>Price</th>
                            </tr>
                            <?php 
                                $total=0;
                                $ip=get_ip();
                                $run_cart=mysqli_query($conn,"SELECT * FROM cart where ip_address ='$ip' ");
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
                                    
                            ?>
                            <tr align="center">
                                <td><input type="checkbox"  name="remove[]" value="<?php echo $product_id; ?>" /></td>
                                <td><?php echo $product_name; ?>
                                <br/>
                                <img src="product_images/<?php echo $product_image; ?> "/> </td>
                                <td><?php echo $sing_price; ?> </td>
                            </tr>
                            <?php  } }  //END WHILE ?>
                            <tr>
                                <td colspan="4" align="right"><b>Sub Total:</b></td>
                                <td><?php echo  total_price(); ?> </td>
                            </tr>
                            <tr align="center">
                                <td colspan="1">
                                     <?php 
                                        $get_product ="SELECT * FROM products";
                                        $run_product = mysqli_query($conn, $get_product);
                                        $check_product=mysqli_num_rows($run_product);
                                        $get_cart ="SELECT * FROM cart";
                                        $run_cart = mysqli_query($conn, $get_cart);
                                        $check_cart=mysqli_num_rows($run_cart); 
                                        if($check_product==0||$check_cart==0){
                                            echo "<input type='submit' name='update_cart' value='Update Cart' disabled/>
                                                    ";
                                        }
                                        else{
                                            echo "<input type='submit' name='update_cart' value='Update Cart'
                                                    ";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $get_product ="SELECT * FROM products";
                                        $run_product = mysqli_query($conn, $get_product);
                                        $check_product=mysqli_num_rows($run_product);
                                        $get_cart ="SELECT * FROM cart";
                                        $run_cart = mysqli_query($conn, $get_cart);
                                        $check_cart=mysqli_num_rows($run_cart); 
                                        if($check_product==0||$check_cart==0){
                                            echo "<input type='submit' name='continue' value='Continue Shopping' disabled />
                                                    ";
                                        }
                                        else{
                                            echo "<input type='submit' name='continue' value='Continue Shopping'  />
                                                    ";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $get_product ="SELECT * FROM products";
                                        $run_product = mysqli_query($conn, $get_product);
                                        $check_product=mysqli_num_rows($run_product);
                                        $get_cart ="SELECT * FROM cart";
                                        $run_cart = mysqli_query($conn, $get_cart);
                                        $check_cart=mysqli_num_rows($run_cart); 
                                        if($check_product==0||$check_cart==0){
                                            echo "<a href='checkout2.php' class='btn btn-primary disabled' role='button' aria-disabled='true'>Checkout</a>
                                                    ";
                                        }
                                        else{
                                            echo "<button class='btn btn-primary'><a href='checkout2.php'>Checkout</a></button>
                                                    "; 
                                        }
                                    ?>
                                        
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                        if(isset($_POST['remove'])){
                            foreach($_POST['remove'] as $remove_id){
                                $run_delete = mysqli_query($conn,"DELETE FROM cart WHERE product_id = '$remove_id' AND ip_address='$ip' ");
                                if($run_delete){
                                    echo "<script>window.open('cart2.php','_self')</script>";
                                }
                            }
                        }
                        if(isset($_POST['continue'])){
                            echo "<script>window.open('home_user2.php','_self')</script>";
                        } 
                    ?>
                </div>
            </div>
        </div>


        

        

        
        <!--<footer>
            <div class="container-fluid pt-5 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <h5 align="center">Online Shopping Site, Copyright &copy; 2021</h5>
                            </div>
                            <div class="row mb-4">
                                <div class="underline bg-light" style="width: 50px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <p align="center">Online Shopping Site, Copyright &copy; 2021</p>
            </div>
        </footer>-->


        <script src="Jquery/jquery-3.5.1.slim.min.js"></script>
        <script src="Popper/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>