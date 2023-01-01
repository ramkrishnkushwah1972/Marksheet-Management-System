<?php
session_start();
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
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css" > 
        <script type="text/javascript">
        function show() {
            document.getElementById("successfulsms").style.display="block";
        }
        setTimeout("show()",300);

        function hide() {
            document.getElementById("successfulsms").style.display="none";
        }
        setTimeout("hide()",6000);
        </script>
        <style type="text/css">
        #successfulsms{
            
            /*visibility: hidden;*/ 
            display: none;
            height: 60px;
            width: 600px;
            text-align: center;
            background-color:#07CD07;
            border-radius: 5px;
            margin:auto; 
            padding-top: 10px;
        }
        .showsms{
                margin-top: 5px;
                color:#F9FAF9;
        }
        .modal-body{
                font-family: "Poppins";
            }
            .modal-header{
                margin-top: 10px;
                height: 50px;
                text-align: center;
                font-size:20px;
                font-family: "Poppins"; 
                color: red;
            }
            
    </style>
    
    </head>
    <body  style="background-color: white;" > <!-- class="top-navbar-fixed" -->
        <div class="main-wrapper">
            <h1 align="center" style="margin-top: 50px; color:black; font-size:40px; text-shadow: 5px 3px 3px #888;">MARKSHEET MANAGEMENT SYSTEM</h1>
                                    <div id="<?php echo $_SESSION['successfulsms']; unset($_SESSION['successfulsms']); ?>">
                                    <h3 class="showsms"><?php echo $_SESSION['sms']; unset($_SESSION['sms']); ?></h3>
                                    </div>
                                
            <div class="spinner-border text-primary"></div>
            <div class="container">
            <div style="margin-top: 100px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h3>Search Student Result</h3>
                                </div>
                            </div>
                            <div class="panel-body p-20">
<form action="result.php" method="post">
<div class="form-group">
<label for="rollid">Enter Your Roll No</label>
<input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll No" autocomplete="off" name="rollNo" required="required">
</div>
<div class="form-group">
<label for="default" >Class</label>
<select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php
$query = "SELECT * FROM classestbl";
$data = mysqli_query($conn, $query);
while($result = mysqli_fetch_assoc($data))
{
?>
<option value="<?php echo $result['id']; ?>"><?php echo $result['className']; ?> (<?php echo $result['year'];?>)</option>
<?php
}
?>
</select>
</div>
<div class="form-group mt-20">
<div class="">
                                      
<button type="submit" class="btn btn-success btn-labeled pull-right">Search<span class="btn-label btn-label-right"></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <?php include('login.php')?>
                
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!--container-->
        </div>
        <!-- <div class="col-md-">
        </div> -->
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