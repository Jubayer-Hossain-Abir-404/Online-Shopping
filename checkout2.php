<?php
    session_start();
    //include('connection.php');
    include('function.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Check Out</title>
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
                        <!--Account-->
                    </div>
                    <div class="col-md-4">
                    My Cart - <?php 
                                    $get_cart=mysqli_query($conn,"SELECT * FROM cart");
                                    while($row=mysqli_fetch_array($get_cart)){
                                        $run_remove=mysqli_query($conn,"DELETE FROM cart WHERE product_id='$row[product_id]' ");
                                    }
                                    total_price(); 
                                ?> 
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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home_user2.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart2.php">Shopping Cart</a>
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
            <?php 
                if(!isset($_SESSION['user_name'])){
                    include('login1.php');
                }
                else{
                    echo "<div class='shopping_cart_container'>
                                <div id='shopping_cart' align='center' style='padding: 15px'>
                                <b style='color:navy'>Your Order has been taken </b>
                                </div>
                          </div>";
                }
             ?>    
        </div>


        <script src="Jquery/jquery-3.5.1.slim.min.js"></script>
        <script src="Popper/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>