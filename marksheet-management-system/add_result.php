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

        <script type="text/javascript">
            function getstudentdata(id){
                $.ajax({
                    type:'post',
                    url:'get_data.php',
                    data:'id='+id,
                    success:function(result){
                    $("#studentid").html(result);
                    }
                    });
                $.ajax({
                    type: "post",
                    url: "get_data.php",
                    data:'classid1='+id,
                    success: function(result){
                    $("#subject").html(result);
                    //alert(data);  
                    }
                    });  
                }
        </script>
        
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
                                <h2 class="title">Declare Result</h2>                
                            </div>    
                            </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li> 
                                        <li class="active">Student Result</li>
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
                                    <div class="panel-body">
<form action="manage_result.php" method="post" class="form-horizontal" >
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Class</label>
 <div class="col-sm-10">
 <select name="classid" class="form-control ctid" id="classid" onChange="getstudentdata(this.value);" required="required">
<option value="">Select class</option>
<?php 
$query = "SELECT DISTINCT id,className,year FROM classestbl";
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
<label for="date" class="col-sm-2 control-label ">Student Name</label>
<div class="col-sm-10">
<select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
</select>
</div>

</div>

<div class="form-group">                                                      
<div class="col-md-8 col-sm-offset-2">
<div  id="reslt">

</div>
</div>
</div>
                                                    
<div class="form-group">
<label for="date" class="col-sm-2 control-label">Subjects</label>
<div class="col-sm-10">
<div class="container-fluid">
<div  id="subject">

</div>
</div>
</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
    </div>
</div>

</form>
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

  