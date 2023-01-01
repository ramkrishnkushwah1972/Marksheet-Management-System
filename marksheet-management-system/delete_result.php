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
$query = "DELETE FROM resultstbl WHERE studentId='$did'";
$data = mysqli_query($conn , $query);
        if ($data) 
        {
            echo "Successful Data Deleted";
            header('Location:manage_result.php');
        }
//Delete code end
?>
