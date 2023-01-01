<?php
include("include/connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marksheet Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
             <?php include('include/top-bar.php') ?>   
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include('include/side-bar.php') ?>
                    
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Admin Change Password</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    
                                        <li class="active">Admin change password</li>
                                    </ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Admin Change Password</h5>
                                                </div>
                                            </div>
       
                                            <div class="panel-body">

                                                <form action="" method="post"name="">
                                                    <div class="form-group ">
                                                        <label for="success" class="control-label">Current Password</label>
                                                        <div class="">
                                    <input type="password" name="currentpassword" class="form-control" required="required" id="success">
                                                      
                                                        </div>
                                                    </div>
                                                       <div class="form-group ">
                                                        <label for="success" class="control-label">New Password</label>
                                                        <div class="">
                                                            <input type="password" name="newpassword" required="required" class="form-control" id="success">
                                                        </div>
                                                       </div>
                                                     <div class="form-group ">
                                                        <label for="success" class="control-label">Confirm Password</label>
                                                        <div class="">
                                                            <input type="password" name="confirmpassword" class="form-control" required="required" id="success">
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-primary ">Change</button>
                                                    </div>
<?php

if (isset($_POST['submit'])) 
{
$cp = $_POST['currentpassword'];
$np = $_POST['newpassword'];
$conp = $_POST['confirmpassword'];

$query = "SELECT id FROM admin where password='$cp' ";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$total = mysqli_num_rows($data);
$id=$result['id'];
if ($total>0) 
{


    if($np!=$conp)
    {
    ?>
        <h4 style="color: #F53415; text-align: center;">Incurrect new password or confirm password</h4>
    <?php
    }
    else
    {
        $query = "UPDATE admin SET password='$np' WHERE id='$id' ";
        $data = mysqli_query($conn,$query);
        if ($data)
        {
        ?>
            <h4 style="color: #30F515 ; text-align: center;">Successfully Change password</h4>

        <?php
        }
        else
        {
        ?>
            <h4 style="color: #F53415;">Failed Change password</h4>            
            
        <?php
        }
    }

}
else
    {
    ?>
        <h4 style="color: #F53415; text-align: center;">Incurrect Current password</h4>                
    <?php
    }
}
?>

                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                       

                    <!-- /.main-page -->
                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        
  </body>
</html>

  