<!-- <?php
include("include/connection.php");
// error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>sign in</title>
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="./bootstrap/css/from.css">
      <link rel="stylesheet" type="text/css" href="form-validation.css">
      <script src="netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
      <script src="code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Login</b></h5>

            <form action="" method="POST" class="form-signin">

              <div class="form-label-group">
                
                <label for="inputEmail">Email address</label>
                <input type="text" id="inputEmail" class="form-control"name="username" autofocus>
                </div>
                <div class="form-label-group">
                
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control"name="password" required>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <input name="submit" type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" >Sign up</input>
                <hr class="my-4">
          </form>

<?php

if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query ="SELECT username,password FROM admin WHERE username='$username' and password='$password' ";
$data= mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
$total =mysqli_num_rows($data);
if($total > 0)
{
    //$_SESSION['adminlogin']=$username;
    header('Location:copy.php');
} 
else
{
    echo "<script>alert('Invalid Username or password');</script>";
}    
}
?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html> -->