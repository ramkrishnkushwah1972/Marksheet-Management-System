<?php
include("include/connection.php");
error_reporting(0);
session_start();
$username= $_SESSION['adminlogin'];
if ($username==true) {
}
else
{
    header('Location:home.php');
}
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
        <!-- <link rel="stylesheet" href="css/mystyle.css" media="screen" > -->

        
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
                                    <h2 class="title">Add Student</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="#">Students</a></li>
                                        <li class="active">Add Student</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                        <div class="container-fluid">  
                        <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
<div class="panel-body">
<form  action="manage_student.php" method="POST" enctype="multipart/form-data" class="form-horizontal" >

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullname" class="form-control" id="fullname" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Roll No</label>
<div class="col-sm-10">
<input type="text" name="rollid" class="form-control" id="rollid" maxlength="10" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email id</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" id="email" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Class</label>
 <div class="col-sm-10">
 <select name="class" class="form-control" id="default" >
<option value="">Select Class</option>
<?php 
$query = "SELECT *FROM classestbl";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
while ($result = mysqli_fetch_assoc($data)) 
{
?>
<option value="<?php echo $result['id'];?>"><?php echo $result['className']; ?> &nbsp; <?php echo $result['year']; ?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label for="date" class="col-sm-2 control-label">DOB</label>
<div class="col-sm-10">
<input type="date"  name="dob" class="form-control" id="date">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Father Name</label>
<div class="col-sm-10">
<input type="text" name="father_name" class="form-control" id="father_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Mother Name</label>
<div class="col-sm-10">
<input type="text" name="mother_name" class="form-control" id="mother_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Village</label>
<div class="col-sm-10">
<input type="text" name="village" class="form-control" id="village" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="date" class="col-sm-2 control-label">Image</label>
<div class="col-sm-10">
<input type="file"name="fileToUpload" id="fileToUpload" >
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>                        
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

  