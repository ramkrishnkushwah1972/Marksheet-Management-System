<?php
include("include/connection.php");
//error_reporting(0);
session_start();
$username= $_SESSION['adminlogin'];
if ($username==true) {}
else
{
    header('Location:home.php');
}
$sid= $_GET['sid'];
if(isset($_POST['update']))
{

$rowid=$_POST['subject'];
$marks=$_POST['marks']; 

foreach($_POST['subject'] as $count => $id){
$mrks=$marks[$count];
$iid=$rowid[$count];
for($i=0;$i<=$count;$i++) {

$query="UPDATE resultstbl  set marks='$mrks' where id='$iid' ";
$data = mysqli_query($conn,$query);
//$result = mysqli_fetch_assoc($data);
    if ($data) 
    {
        header('Location:manage_result.php');
    }
    else
    {
        echo " failled";
    }

}
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
        <script src="js/jquery/jquery.js"></script>

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
                                    <h2 class="title">Update Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Result Info</li>
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
                                            <h5>Update the Result info</h5>
                                            </div>
                                            </div>
                                            <div class="panel-body">
<form action="" method="post" class="form-horizontal" >
<?php 

$query= "SELECT distinct studentstbl.studentName,classestbl.className,classestbl.year from resultstbl join studentstbl on resultstbl.studentId=resultstbl.studentId join subjectstbl on subjectstbl.id=resultstbl.subjectId join classestbl on classestbl.id=studentstbl.classId where studentstbl.studentId=$sid ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$cnt=1;
if($total> 0)
{
while($result = mysqli_fetch_assoc($data))
{  
?>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<?php echo $result['studentName'];?>
</div>
</div>

<div class="form-group">           
<label for="default" class="col-sm-2 control-label">Class</label>
<div class="col-sm-10">
<?php echo $result['className'];?> (<?php echo $result['year'];?>)
</div>
</div>
<?php 
} 
}?>


<?php

$query = "SELECT DISTINCT studentstbl.studentName,studentstbl.studentId,classestbl.className,classestbl.year,subjectstbl.subjectName,resultstbl.marks,resultstbl.id as SubjectName from resultstbl join studentstbl on studentstbl.studentId=resultstbl.studentId join subjectstbl on subjectstbl.id=resultstbl.subjectId join classestbl on classestbl.id=studentstbl.classId where studentstbl.studentId='$sid' ";
$data = mysqli_query($conn, $query);
if ($total = mysqli_num_rows($data)>0)
{while ($result = mysqli_fetch_assoc($data)) 
{
?>  
<div class="form-group">
<label for="default" class="col-sm-2 control-label"><?php echo $result['subjectName'];?></label>
<div class="col-sm-10">
<input type="hidden" name="subject[]" value="<?php echo $result['SubjectName'];?>">
<input type="text" name="marks[]" class="form-control" id="marks" value="<?php echo $result['marks']; ?>" maxlength="5" required="required" autocomplete="off" placeholder="Enter marks out of 100">
</div>
</div>
<?php
}
}
?>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="update" id="submit" class="btn btn-primary">Update Result</button>
    </div>
</div>
</form>
</section>

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

  