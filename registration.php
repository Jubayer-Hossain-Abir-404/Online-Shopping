<?php include "connection.php" ;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Registration Form </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid bg-dark header-top d-none d-md-block">
            <div class="container">
                <div class="row text-light pt-2 pb-2">
                    <div class="col-md-5">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>Online Shopping.com
                    </div>
                </div>
            </div>
            <div id="content_area">
                
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <br><br><h1>Registration Form</h1>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="user_name">Enter User name</label>
                                <input type="text" placeholder="User Name"class="form-control" name="user_name" id="user_name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input type="email" placeholder="Email"class="form-control" name="email" id="email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Enter Phone Number</label>
                                <input type="text" placeholder="Phone Number"class="form-control" name="phone_number" id="phone_number" required/>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input type="password" placeholder="Password" class="form-control" name="password" id="password" required/>
                            </div>
                            <input type="submit" id ="Register" name="Register" value="Register"class="btn btn-outline-danger">
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
        if(isset($_POST['Register'])){
              $user_name=$_POST['user_name'];
              $email=$_POST['email'];
              $phone_number=$_POST['phone_number'];
              $password=$_POST['password'];
              $SELECT= "SELECT email From user_registration Where email = ? Limit 1";
              $INSERT= "INSERT Into user_registration (user_name, email, phone_number, password) values(?, ?, ?, ?)";

              //prepare statement
              $stmt = $conn->prepare($SELECT);
              $stmt->bind_param("s",$email);
              $stmt->execute();
              $stmt->bind_result($email);
              $stmt->store_result();
              $rnum= $stmt->num_rows;
              if($rnum==0){
                  $stmt->close();
                  $stmt=$conn->prepare($INSERT);
                  $stmt->bind_param("ssss", $user_name, $email, $phone_number, $password);
                  $stmt->execute();
                  echo "
                        <br><div class='alert alert-success'>
                          Registration Successful !!!!
                        </div>
                        ";
              }
              else{
                  echo "
                        <br><div class='alert alert-danger' role='alert'>
                          Someone has already registered using this information !!!!
                        </div>
                        ";
              }
              $stmt->close();
              $conn->close();

        }
    ?>