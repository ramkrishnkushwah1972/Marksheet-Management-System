<?php
include("include/connection.php");
session_start();
error_reporting(0);
if (isset($_POST['update']))
{
    $MobileNo = $_POST['MobileNo'];
    $NewPassword= md5($_POST['NewPassword']);
    $ConfirmPassword =md5($_POST['ConfirmPassword']);
    
    if($NewPassword != $ConfirmPassword)
    {
    
                    $_SESSION['successfulsms']="successfulsms";
                    $_SESSION['sms']="New password & confirm password Not Match";
                    header('Location:home.php');
    
    }
    else
    {
        $query ="SELECT mobile FROM admin WHERE mobile ='$MobileNo' ";
        $data= mysqli_query($conn,$query);
        $total =mysqli_num_rows($data);
        if($total > 0)
        {
                        $query2 = "UPDATE admin SET password='$NewPassword' WHERE mobile ='$MobileNo' ";        
                        $data2 = mysqli_query($conn , $query2);
                        $_SESSION['successfulsms']="successfulsms";
                        $_SESSION['sms']="Password Updated";
                        header('Location:home.php');
        }
        else
            {
                        $_SESSION['successfulsms']="successfulsms";
                        $_SESSION['sms']="Mobile no. not registered please try again";
                        header('Location:home.php');
            }
    }       
}

?>