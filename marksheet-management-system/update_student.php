<?php
include("include/connection.php");
error_reporting(0);
session_start();
$username= $_SESSION['adminlogin'];
if ($username==true) {}
else
{
    header('Location:home.php');
}
$sid = $_GET['sid'];
$query = "SELECT studentstbl.studentName,studentstbl.rollNo,studentstbl.emailId,studentstbl.gender,studentstbl.dob,studentstbl.imagename,classestbl.className,classestbl.year FROM studentstbl join classestbl WHERE studentId='$sid'and studentstbl.classId = classestbl.id ";
$data = mysqli_query($conn, $query);
$result =  mysqli_fetch_assoc($data);
$studentName =$result['studentName'];
$rollNo =$result['rollNo'];
$emailId =$result['emailId'];
$gender = $result['gender'];
$dob= $result['dob'];
$className =$result['className'];
$year =$result['year'];
$img = $result['imagename'];

if(isset($_POST['update']))
{   
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    
    $studentName = $_POST['studentName'];
    $rollNo = $_POST['rollNo'];
    $emailId = $_POST['emailId'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $folder = "students/".$filename;
    move_uploaded_file($tempname,$folder);
    
    if ($studentName !="" && $rollNo !="" && $gender !="" && $dob !=""){
    $query = "UPDATE studentstbl SET studentName='$studentName',rollNo='$rollNo',emailId='$emailId',gender='$gender',dob='$dob',imagename='$filename' WHERE studentId='$sid' ";
    $data = mysqli_query($conn , $query);
    if ($data) 
    {
        //echo "Successful Data Updated";
        header('Location:manage_student.php');
    }
    else
        echo "data not update";
    }
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
                                    <h2 class="title">Update Students</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage_student.php">Students</a> </li>
                                        <li class="active">Update Students</li>
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
<form  action="" method="post" enctype="multipart/form-data"  class="form-horizontal" >

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="studentName" value="<?php echo $studentName; ?>" class="form-control" id="fullname" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Roll No</label>
<div class="col-sm-10">
<input type="text" name="rollNo" value="<?php echo $rollNo; ?>" class="form-control" id="rollid" maxlength="10" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email Id</label>
<div class="col-sm-10">
<input type="email" name="emailId" value="<?php echo $emailId; ?>" class="form-control" id="email"autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<?php 
if ($gender =="Male") 
{
?>
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php
}
?>
<?php 
if ($gender =="Female") 
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required"checked="">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php
}
?>
<?php 
if ($gender =="Other") 
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required"checked="">Other
<?php
}
?>

</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Class</label>
 <div class="col-sm-10">
    <input type="text" name="class" value="<?php echo $className; ?>(<?php echo $year; ?>)" class="form-control" id="class" required="required" autocomplete="off" readonly>
 <!-- <select name="class" value="<?php echo $result['class']; ?>" class="form-control" id="default" >
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
</select> -->
</div>
</div>

 <div class="form-group">
<label for="date" class="col-sm-2 control-label">DOB</label>
<div class="col-sm-10">
<input type="date"  name="dob" value="<?php echo $dob; ?>" class="form-control" id="date">
</div>
</div>
<div class="form-group">
<label for="date" class="col-sm-2 control-label">Image</label>
<div class="col-sm-10">
<input type="file"name="fileToUpload" id="fileToUpload" value="" >
<?php echo $img; ?>
</div>
</div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="update" value="submit" class="btn btn-primary">Update</button>
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

  