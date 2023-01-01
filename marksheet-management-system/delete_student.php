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
$query1 = "DELETE FROM studentstbl WHERE studentId='$did'";
$data = mysqli_query($conn , $query1);
        if ($data) 
        {
            echo "Successful Data Deleted";
            $query2 = "DELETE FROM resultstbl WHERE studentId='$did'";
            $data = mysqli_query($conn , $query2);
            
            header('Location:manage_student.php');
        }
        else
        	echo "Data Not Deleted";
//Delete code end
?>
