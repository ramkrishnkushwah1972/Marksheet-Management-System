<?php
include("include/connection.php");
session_start();
error_reporting(0);
if (isset($_POST['register']))
{
    $cuid = $_POST['createusername'];
    $M_no = $_POST['Mobile_no'];
    $cp = md5($_POST['createpassword']);
    
    if ($cuid !="" && $cp !="" && $M_no !="") 
    {
        
                $query = "INSERT INTO admin(username,password,mobile) VALUES('$cuid','$cp' , '$M_no')";
                $data = mysqli_query($conn, $query);
                if($data)
                {
            
                    $_SESSION['successfulsms']="successfulsms";
                    $_SESSION['sms']="Registration Successfully Done";
                    header('Location:home.php');
                }        
            
        
    }
    else
        echo "all fields required";
}

?>