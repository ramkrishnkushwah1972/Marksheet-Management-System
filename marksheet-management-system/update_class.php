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
$id=$_GET['id'];
$classname= $_GET['class'];
$classyear = $_GET['year'];
    
if(isset($_POST['update']))
{   
    
    $classname= $_POST['classname'];
    $classyear = $_POST['classyear'];
    if( $classname !="" && $classyear !="")
    {
        $query = "UPDATE classestbl SET className='$classname', year='$classyear' WHERE id='$id' ";
        $data = mysqli_query($conn , $query);
        if ($data) 
        {
            echo "Successful Data Updated";
            header('Location:manage_class.php');
        }
    }
    else
        echo "All field required";

}
else
    //echo "Data not update";
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
                                    <h2 class="title">Update Class</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage_class.php">Classes</a></li>
                                        <li class="active">Update Class</li>
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
                                                    <h5>Update Class</h5>
                                                </div>
                                            </div>
                                        
  
                                            <div class="panel-body">

                                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="success" class="control-label">Class Name</label>
                                                        <div class="">
                                                            
                                                         <input type="text" name="classname" value="<?php echo $classname ?>" class="form-control" required="required" id="success">
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label for="success" class="control-label">Year </label>
                                                        <div class="">
                                                            <?php $query="SELECT year FROM classestbl";
                                                            $data= mysqli_query($conn, $query); 
                                                            $result=mysqli_fetch_assoc($data)
                                                            ?>
                                                            <select name="classyear" class="form-control" >
                                                                <option value="">Select</option>
                                                                <option value="First year"
                                                                <?php 
                                                                    if ($classyear =='First year') {
                                                                        echo "selected";
                                                                    }
                                                                ?>
                                                                > First Year</option>
                                                                <option value="Second year"
                                                                <?php 
                                                                    if ($classyear =='Second year') {
                                                                        echo "selected";
                                                                    }
                                                                ?>

                                                                > Second Year</option>
                                                                <option value="Final year"
                                                                <?php 
                                                                    if ($classyear =='Final year') {
                                                                        echo "selected";
                                                                    }
                                                                ?>

                                                                > Final Year</option>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="update" value="submit" class="btn btn-primary">Update</button>
                                                    </div>


                                                    
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

  