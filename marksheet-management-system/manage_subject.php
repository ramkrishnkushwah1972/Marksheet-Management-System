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
if ($_POST['submit'])
{
    $subjectname= $_POST['subjectname'];
    $subjectcode= $_POST['subjectcode'];
    $classyear= $_POST['classyear'];

    
    if ($subjectname !="" && $subjectcode !="" && $classyear !="") 
    {
        
        $sql = "INSERT INTO subjectstbl(classId,subjectName,subjectCode) VALUES( '$classyear','$subjectname','$subjectcode')";
        $data = mysqli_query($conn, $sql);
        if($data)
        {
            header('Location:manage_subject.php');
        }
    }
        else
        echo "all fields required";
    
}
$query = "SELECT subjectstbl.id,subjectstbl.subjectName,subjectstbl.subjectCode,subjectstbl.creationDate,subjectstbl.updationDate,classestbl.className,classestbl.year FROM subjectstbl join classestbl on subjectstbl.classId=classestbl.id";
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
                                    <h2 class="title">Manage Subjects</h2>
                                
                                </div>
                                    
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Subjects</li>
                                        <li class="active">Manage Subjects</li>
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
                                                    <h5>View Subjects Info</h5>
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
                                                            <th>Subject Name</th>
                                                            <th>Subject Code</th>
                                                            <th>Class</th>
                                                            <th>Creation Date</th>
                                                            <th>Updation Date</th>
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
                                                    <td><?php echo $result['subjectName'];?></td>
                                                    <td><?php echo $result['subjectCode'];?></td>
                                                    <td><?php echo $result['className'];?> ( <?php echo $result['year'];?>)</td>
                                                    <td><?php echo $result['creationDate'];?></td>
                                                    <td><?php echo $result['updationDate'];?></td>
                                                    <td>
                                                    <a href="update_subject.php?id=<?php echo $result['id'];?>"> <i class="fa fa-edit" title="Update Record"style="color: blue;"></i> </a> 
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="delete_subject.php?did=<?php echo $result['id'];?>"onclick="return checkdelete();"><i class="fa fa-trash" title="Delete Record" style="color: red;"></i> </a>
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
            return confirm('Are you sure delete this subject . if yes, so will be this subject deleted also from result table .');
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

