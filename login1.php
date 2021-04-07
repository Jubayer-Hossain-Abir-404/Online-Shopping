<?php 
    include "connection.php" ;
    //include('function.inc.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <br><br><h1>Login Form</h1><br><br>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          <!--<div class="form-group">
                                <label id="UserType" for="UserType">User Type</label>
                                <div>
                                  <label for="Admin" class="radio-inline"><input type="radio" name="UserType" id="Admin" value="Admin" required>Admin&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  <label for="User" class="radio-inline"><input type="radio" name="UserType" id="User" value="User" required>User</label>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="user_name">Enter User name</label>
                                <input type="text" placeholder="User Name"class="form-control" name="user_name" id="user_name" required/>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input type="password" placeholder="Password" class="form-control" name="password" id="password" required/>
                            </div>
                            <input type="submit" id ="login" name="login" value="login" class="btn btn-block btn-danger"><br>
                            <a href="registration.php" target="_blank" class="btn btn-primary btn-lg col text-center">Create New Account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="Jquery/jquery-3.5.1.slim.min.js"></script>
    <script src="Popper/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php 
        if(isset($_POST['login'])){
              //$UserType=$_POST['UserType'];
              $user_name=$_POST['user_name'];
              $password=$_POST['password'];
              /*if($UserType=='Admin'&&$user_name=='Admin'&&$password=='Admin'){
                    header("Location: home_admin.php");
                }*/
                $sql= "SELECT * FROM user_registration WHERE user_name='$user_name' AND password='$password'";
                $query=mysqli_query($conn, $sql);
                $result=mysqli_num_rows($query);
                if($result==0){
                    echo "<script>alert('Password or User Name is incorrect, please try again!')</script>";
                    exit();
                }
                $ip=get_ip();
                $run_cart=mysqli_query($conn, "SELECT * FROM cart WHERE ip_address='$ip'");
                $check_cart=mysqli_num_rows($run_cart);
                if($result>0 AND $check_cart==0){
                    //header("Location: home_user.php");
                        $_SESSION['user_name']=$user_name;
                        echo "<script>alert('You have logged in successfully !')</script>";
                        echo "<script>window.open('home_user2.php','_self')</script>";
                    
                }
                else{
                        $_SESSION['user_name']=$user_name;
                        echo "<script>alert('You have logged in successfully !')</script>";
                        echo "<script>window.open('home_user2.php','_self')</script>";
                }
              

        }
?>