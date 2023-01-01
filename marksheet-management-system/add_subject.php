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
                                    <h2 class="title">Add Subject</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Subjects</li>
                                        <li class="active">Add Subject</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                        <div class="container-fluid"> 
                        <div class="row">
                                    <div class="col-md-8 col-sm-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Add Subject</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <form action="manage_subject.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="default" class="control-label">Subject Name</label>
                                                        <div class="">
                                                        <input type="text" name="subjectname" class="form-control" id="default" placeholder="Subject Name" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class=" control-label">Subject Code</label>
                                                        <div class="">
                                                        <input type="text" name="subjectcode" class="form-control" id="default" placeholder="Subject Code" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="default" class=" control-label">Class</label>
                                                        <div class=""> 
                                                        <select name="classyear" class="form-control">
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
                                                        <div class="">
                                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                    <!--/.container-fluid-->
                </section>
                <!-- section -->
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

  