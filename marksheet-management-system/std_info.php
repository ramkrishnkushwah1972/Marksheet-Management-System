<?php
include('include/connection.php');
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
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">
                    <!-- /.left-sidebar -->
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h1 align="center" style="margin-top: 10px; color:black; font-size:30px; text-shadow: 5px 3px 3px #888;">STUDENT INFORMATION</h1>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <section class="section" id="exampl">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="">
                                                    <h3 align="center">Student Details</h3>
                                                    <hr/>                       

<?php
//start code Student Data
$rollNo=$_POST['rollNo'];
$classid=$_POST['class'];

$query = "SELECT  studentstbl.studentName,studentstbl.rollNo,studentstbl.regDate,studentstbl.studentId,studentstbl.imagename,studentstbl.fatherName,studentstbl.motherName,studentstbl.village,classestbl.className,classestbl.year from studentstbl join classestbl on classestbl.id=studentstbl.classId where studentstbl.rollNo=$rollNo ";


$data =mysqli_query($conn,$query);
while($result = mysqli_fetch_assoc($data))
{  
?>
<div class="panel-body p-20">
<table class="table  table-bordered" border="1" width="100%">
<tr>
<td width="150px"><p><b>Student Name </b> 
<p><b>Student Class </b>
<p><b>Student Roll no. </b> 
<p><b>Father Name </b> 
<p><b>Mother Name </b> 
<p><b>Village </b> 
<td>
<?php echo $result['studentName'];?></p> 
<?php echo $result['className'];?> ( <?php echo $result['year'];?>)</p>
<?php echo $result['rollNo'];?></p> 
<?php echo $result['fatherName'];?></p> 
<?php echo $result['motherName'];?></p> 
<?php echo $result['village'];?></p> 
</td>
</td>
<td style="text-align: center"><img src="students/<?php echo $result['imagename']; ?>" vspace="3px" width="150px" height="150px" ></td>
</tr>
</div>
</table>

<?php 
}
?>
</div>
<div class="panel-body p-20">
<table class="table  table-bordered" border="1" width="100%" >
    <thead>
        <tr style="text-align: center">
            <th style="text-align: center">S.no</th>
            <th style="text-align: "> Subjects</th>    
            <th style="text-align: center">Marks</th>
        </tr>
        <!-- <tr><button type="button" class="btn btn-primary "Onclick="printresult();">Print Info.</button></tr> -->
    </thead>
                                                	
    <tbody>
<?php                                              
// Code for result

 $query ="SELECT t.studentName,t.rollNo,t.classId,t.marks,subjectId,subjectstbl.subjectName from (select sts.studentName,sts.rollNo,sts.classId,tr.marks,subjectId from studentstbl as sts join  resultstbl as tr on tr.studentId=sts.studentId) as t join subjectstbl on subjectstbl.id=t.subjectId where (t.rollNo='$rollNo' )";
 $data = mysqli_query($conn,$query);
 $count=1;
 if ($total=mysqli_num_rows($data)) 
{
 while($result=mysqli_fetch_assoc($data))
{
?>
<tr>
<th scope="row" style="text-align: center"><?php echo $count;?></th>
<td style=""><?php echo $result['subjectName'];?></td>
<td style="text-align: center"><?php echo $totalmarks=$result['marks'];?></td>
</tr>
<?php 
$totlcount+=$totalmarks;
$count++;
}
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Total Marks</th>
<td style="text-align: center"><b><?php echo $totlcount; ?></b> out of <b><?php echo $outof=($count-1)*(100); ?></b></td>
</tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Percentage</th>           
<td style="text-align: center"><b><?php echo ($totlcount*(100)/$outof); ?> %</b></td>
</tr>

<?php
if (($totlcount*(100)/$outof)>=33)
{
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Result</th>           
<td style="text-align: center"><b>Pass</b></td>
</tr>
<?php    
}
else
{
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Result</th>           
<td style="text-align: center"><b>Fail</b></td>
</tr>
<?php    
}
?>

<tr>
<td colspan="3" align="center"><button type="button" class="btn btn-primary "Onclick="printresult();">Print Result</button></td>
</tr>
<?php 
} 
else 
{ 
?>     
<div class="alert alert-warning left-icon-alert" role="alert">
    <strong>Notice!</strong> Results of this student have not been generated yet
<?php 
}
?>
</div>
</div>
</tbody>
</table>
</div>
</div>
    <!-- /.panel -->
</div>
<!-- /.col-md-6 -->
<div class="form-group">
    <div class="col-sm-6" style="margin-top: 20px;" >
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</div>   
        </div>
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
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>

<script>
    function printresult() {
        window.print();
        }
        </script>

        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
