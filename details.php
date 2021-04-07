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
        <title>Product Details</title>
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
                                    <?php total_items(); ?>
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
                            <a class="nav-link" href="home_user.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                        <input class="form-control mr-sm-2" name= "search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>


        

        

        
        <?php
            echo "<p align='center'>All the details is shown in here</P>";
        ?>


        <script src="Jquery/jquery-3.5.1.slim.min.js"></script>
        <script src="Popper/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>