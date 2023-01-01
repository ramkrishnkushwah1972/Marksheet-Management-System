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
$id= $_POST['id'];

$query= "SELECT studentId,studentName FROM studentstbl WHERE classId='$id'";

$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if ($total!=0) 
{
?>
	<option value="">Select Student</option>
<?php
}
?>

<?php
while($result = mysqli_fetch_assoc($data))
{
?>
 	<option value="<?php echo $result['studentId']; ?>"><?php echo $result['studentName']; ?></option>	
<?php 
}
/////////////////////////////
$classid1= $_POST["classid1"]; 

$query= "SELECT subjectName FROM subjectstbl WHERE classId='$classid1'";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
while($result = mysqli_fetch_assoc($data))
{
?>
  <p> <?php echo $result['subjectName']; ?><input type="text"  name="marks[]" value=""class="form-control" required="" placeholder="Enter marks out of 100" autocomplete="off"></p>
  <!-- <p> <?php echo "Maximum Marks"; ?><input type="text"  name="marks[]" value=""class="form-control" required="" placeholder="Enter Out of Marks" autocomplete="off"></p> -->
<?php  
}

?>
