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
$query = "DELETE FROM subjectstbl WHERE id='$did'";
$data = mysqli_query($conn , $query);
        if ($data) 
        {
            echo "Successful Data Deleted";

            $query2 = "DELETE FROM resultstbl WHERE subjectId='$did'";
            $data = mysqli_query($conn , $query2);
            
            header('Location:manage_subject.php');
        }
//Delete code end
?>
