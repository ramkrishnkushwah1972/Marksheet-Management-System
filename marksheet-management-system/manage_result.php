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
if (isset($_POST['submit']))
{   
    $marks = array();
    $classid= $_POST['classid'];
    $studentid= $_POST['studentid'];
    $Marks= $_POST['marks'];

    $query = "SELECT id FROM subjectstbl WHERE classId='$classid'";
    $data = mysqli_query($conn, $query);

    $sid1=array();
    while($result = mysqli_fetch_assoc($data))
    {
        array_push($sid1,$result['id']);
    }

    for($i=0;$i<count($Marks);$i++){
        $mar=$Marks[$i];
        $sid=$sid1[$i];
        $query="INSERT INTO  resultstbl(studentId,classId,subjectId,marks) VALUES($studentid,$classid,$sid,$mar)";
        $data =mysqli_query($conn,$query);
        }
        if($data)
        {
            //echo "Result info added successfully";
            header('Location:manage_result.php');
        }
        else 
        {
            echo "Something went wrong. Please try again";
        }
    }

$query = "SELECT  distinct studentstbl.studentName,studentstbl.rollNo,studentstbl.studentId,studentstbl.regDate,classestbl.className,classestbl.year from studentstbl join  resultstbl on studentstbl.studentId=resultstbl.studentId  join classestbl on classestbl.id=resultstbl.classId";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$id=1;
?>

</table>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marksheet Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
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
                                    <h2 class="title">Manage Result</h2>
                                
                                </div>
                                    
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Result</li>
                                        <li class="active">Manage Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Result Info</h5>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                              <input class="filter" id="myInput" type="text" placeholder="Search..." >
                                              
                                                
                                             </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no</th>
                                                            <th>Student Name</th>
                                                            <th>Roll No</th>
                                                            <th>Class</th>
                                                            <th>Posting Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody id="myTable">

                                                    <?php
                                                
                                                    while ($result = mysqli_fetch_assoc($data)) 
                                                    {
                                                
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $id;?></td>
                                                    <td><?php echo $result['studentName'];?></td>
                                                    <td><?php echo $result['rollNo'];?></td>
                                                    <td><?php echo $result['className'];?> (<?php echo $result['year']; ?>)</td>
                                                    <td><?php echo $result['regDate'];?></td>
                                                    <td>
                                                    <a href="update_result.php?sid=<?php echo $result['studentId'];?>"><i class="fa fa-edit" title="Update Record"style="color: blue;"></i> </a> 
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="delete_result.php?did=<?php echo $result['studentId'];?>"onclick="return checkdelete();"><i class="fa fa-trash" title="Delete Record" style="color: red;"></i> </a>
                                                    </td>
                                                    </tr>
                                                    <?php $id++ ?>
                                                    <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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

        <!-- filter -->
        <script>
        $(document).ready(function(){
         $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
                 $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                 });
             });
        });
        function checkdelete(){
            return confirm('Are you sure delete this record');
        }
        </script>
        <!-- / .filter -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        

       </body>
</html>

