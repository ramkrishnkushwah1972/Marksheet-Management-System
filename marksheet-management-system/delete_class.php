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
//Delete code start
$did=$_GET['did'];
$query1 = "DELETE FROM classestbl WHERE id='$did'";
$data = mysqli_query($conn , $query1);
        if ($data) 
        {
            echo "Successful Data Deleted";

            $query2 = "DELETE FROM subjectstbl WHERE classId='$did'";
            $data = mysqli_query($conn , $query2);
            $query4 = "DELETE FROM studentstbl WHERE classId='$did'";
            $data = mysqli_query($conn , $query4);
            $query3 = "DELETE FROM resultstbl WHERE classId='$did'";
            $data = mysqli_query($conn , $query3);
            
            header('Location:manage_class.php');
        }
//Delete code end
?>
