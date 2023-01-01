<?php
include("include/connection.php");
error_reporting(0);
session_start();
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password= md5($_POST['password']);
$query ="SELECT username,password FROM admin WHERE username='$username' and password='$password' ";
$data= mysqli_query($conn,$query);
$total =mysqli_num_rows($data);
if($total > 0)
{
    $_SESSION['adminlogin']=$username;
    $_SESSION['sms']="Welcome To The Marksheet Management System";
    $_SESSION['successfulsms']="successfulsms";
    header('Location:dashboard.php');
} 
else
{
    echo "<script>alert('Invalid username or password');</script>";
}    
}
?>
<div class="col-md-4 col-md-offset-2">
    <div class="panel login-box">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h3>Admin Login</h3>
            </div>
        </div>
    <div class="panel-body p-20">
<form action="" method="post">
<div class="form-group">
<label for="rollid">User Id</label>
<input type="text" class="form-control" id="rollid" placeholder="Enter User Id" autocomplete="off" name="username" required="required">
</div>
<div class="form-group">
<label for="default" >Password</label>
<input type="password" class="form-control" id="psw" placeholder="Enter Your password" autocomplete="off"name="password"required="required">
<a href="#"  style="color:blue;"  data-toggle="modal" data-target="#forgot_password">Forgot password?</a>
</div>
   
<div class="form-group mt-20">                                  
  <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Login</button>
  <div><u><a href="#"  style="color:blue;"  data-toggle="modal" data-target="#myModal">Registration</a></u></div>
     <div class="clearfix"></div>
</div>
</form>        
</div>
</div>
</div>
<!-- Registration form -->

         <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p>Registration Form</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="registration.php" method="POST">
<div class="form-group">
<label for="rollid">Create User Id </label>
<input type="text" class="form-control" id="rollid" placeholder="Create User Id" autocomplete="off" name="createusername" required="required">
</div>
<div class="form-group">
<label for="default" >Create Password </label>
<input type="password" class="form-control" id="psw" placeholder="Create password" autocomplete="off"name="createpassword"required="required">
</div>
<div class="form-group">
<label for="default" >Mobile no.</label>
<input type="number" class="form-control" id="psw" placeholder="Enter Mobile no." autocomplete="off"name="Mobile_no"required="required">
</div>
   
<div class="form-group mt-20">    
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
<button type="submit" name="register" class="btn btn-success btn-labeled pull-right">Submit</button>
     <div class="clearfix"></div>
</div>
</form>
        </div>
        
      </div>
    </div>
  </div>

  <!--  start code for forgot password -->

    <div class="modal fade" id="forgot_password">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p>Update Password</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
<form action="forgot_password.php" method="POST">
<div class="form-group">
<label for="rollid">Enter Reg. Mobile no.</label>
<input type="text" class="form-control" id="rollid" placeholder="Enter Reg. Mobile no." autocomplete="off" name="MobileNo" required="required">
</div>
<div class="form-group">
<label for="default" >New Password </label>
<input type="password" class="form-control" id="psw" placeholder="Enter New Password" autocomplete="off"name="NewPassword"required="required">
</div>
<div class="form-group">
<label for="default" >Confrom Password </label>
<input type="password" class="form-control" id="psw" placeholder="Enter Confrom Password" autocomplete="off"name="ConfirmPassword"required="required">
</div>
   
<div class="form-group mt-20">    
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
<button type="submit" name="update" class="btn btn-success btn-labeled pull-right">Update</button>
     <div class="clearfix"></div>
</div>
</form>
        </div>
        
      </div>
    </div>
  </div>