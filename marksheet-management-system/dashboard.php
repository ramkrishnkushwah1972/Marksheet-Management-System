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
$query = "SELECT *FROM classestbl";
$data = mysqli_query($conn, $query);
$totalclass = mysqli_num_rows($data);

$query = "SELECT *FROM subjectstbl";
$data = mysqli_query($conn, $query);
$totalsubject = mysqli_num_rows($data);

$query = "SELECT *FROM studentstbl";
$data = mysqli_query($conn, $query);
$totalstudent = mysqli_num_rows($data);

$query = "SELECT distinct studentId from resultstbl";
$data = mysqli_query($conn, $query);
$totalresults = mysqli_num_rows($data);


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
        <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" >
        <script type="text/javascript">
        function show() {
            document.getElementById("successfulsms").style.visibility="visible";
        }
        setTimeout("show()",300);

        function hide() {
            document.getElementById("successfulsms").style.visibility="hidden";
        }
        setTimeout("hide()",4000);
    </script>
    <style type="text/css">
        #successfulsms{
            
            visibility: hidden; 
            height: 70px;
            width: 500px;
            text-align: center;
            background-color:#07CD07;
            border-radius: 5px;
        }
        .showsms{
                margin-top: 5px;
                color:#F9FAF9;
        }
    </style>
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
                                <div class="col-sm-3">
                                    <h2 class="title">Dashboard</h2>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-9">
                                    <div  id="<?php echo $_SESSION['successfulsms']; unset($_SESSION['successfulsms']); ?>">
                                    <h3 class="showsms"><?php echo $_SESSION['sms']; unset($_SESSION['sms']); ?></h3>
                                    </div>
                                </div>
                                <!-- /.col-9 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-white" href="manage_student.php">
                                        <span class="number counter" style="color: red;" ><?php echo "$totalstudent"; ?></span>
                                        <span class="name" style="color: black;">Registered Students</span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-white" href="manage_subject.php">
                                        <span class="number counter" style="color: red;" ><?php echo "$totalsubject"; ?></span>
                                            <span class="name" style="color: black;">Subjects Listed</span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-white" href="manage_class.php">
                                            <span class="number counter"style="color: red;" ><?php echo "$totalclass"; ?></span>
                                            <span class="name" style="color: black;">Total classes listed</span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-white" href="manage_result.php">
                                            <span class="number counter" style="color: red;" ><?php echo $totalresults; ?></span>
                                            <span class="name" style="color: black;" >Results Declared</span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
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