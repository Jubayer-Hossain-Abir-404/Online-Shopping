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
        <title>Home Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css_code/style.css">
    </head>
    <body>
        <div class="container-fluid bg-dark header-top d-none d-md-block">
            <div class="container">
                <div class="row text-light pt-2 pb-2">
                    <div class="col-md-5">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>Online Shopping.com
                    </div>
                    <div class="col-md-3">
                        <!--echo "<b>Your User Name:</b>" . $_SESSION['user_name'];-->
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
                <?php cart(); ?>
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


        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/b1.jpg" class="d-block w-100" alt="First Slide" style="height: 500px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>BEST WINTER COLLECTION</h1>
                        <p>They’re simple.They’re memorable.They create positive feelings for shoppers.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/b4.jpg" class="d-block w-100" alt="Second Slide" style="height:500px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>BEST WINTER COLLECTION</h1>
                        <p>They’re simple.They’re memorable.They create positive feelings for shoppers.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/b3.jpg" class="d-block w-100" alt="Third Slide" style="height: 500px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>BEST WINTER COLLECTION</h1>
                        <p>They’re simple.They’re memorable.They create positive feelings for shoppers.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container-fluid bg-light-gray">
            <div class="container pt-5">
                <div class="row">
                    <h3>Products</h3>
                </div>
                <div class="underline"></div>
            </div>


            <div class="container mt-5">
                <div class="row">
                    <?php
                        $get_product ="SELECT * FROM products";
                        $run_product = mysqli_query($conn, $get_product);
                        $i=0;
                        while($row_product=mysqli_fetch_array($run_product)){
                            $product_id=$row_product['product_id'];
                            $product_name=$row_product['product_name'];
                            $product_price=$row_product['product_price'];
                            $product_image =$row_product['product_image'];
    
                            echo "
                                <div class='col-md-3'>
                                    <div class='card'>
                                        <img src='product_images/$product_image' class='card-img-top'>
                                        <div class='card-body'>
                                            <h5>$product_name</h5>
                                            <h5>$$product_price</h5>
                                            <div class='box'>
                                                <a href='details.php?product_id=$product_id' class='btn btn-danger'>Details</a>
                                                <a href='home_user2.php?add_cart=$product_id' class='btn btn-danger'>Add to Cart</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                    
                </div>
            </div>
        </div>

        
        <footer>
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
                <!--<p align="center">Online Shopping Site, Copyright &copy; 2021</p>-->
            </div>
        </footer>


        <script src="Jquery/jquery-3.5.1.slim.min.js"></script>
        <script src="Popper/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>