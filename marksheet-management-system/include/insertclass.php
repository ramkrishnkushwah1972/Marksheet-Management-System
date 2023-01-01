<?php
include("connection.php");
error_reporting(0);
if ($_POST['submit'])
{
	$classname= $_POST['classname'];
	$classyear= $_POST['classyear'];
	
	if ($classname !="" && $classyear !="") 
	{
		
		$sql = "INSERT INTO classestbl(className,year) VALUES('$classname','$classyear')";
		$data = mysqli_query($conn, $sql);
		if($data)
		{
			// echo "successful";
		}
	}
	else
		echo "all fields required";
}

$query = "SELECT *FROM classestbl";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
?>
<table>
	<tr>
		<th>class</th>
		<th>year</th>
		<th>creation date</th>

	</tr>

<?php
while ($result = mysqli_fetch_assoc($data)) 
{
	?>
	<tr>
	<td><?php echo $result['className'];?></td>
	<td><?php echo $result['year'];?></td>
	<td><?php echo $result['creationDate'];?></td>
	</tr>
<?php	
}

?>
</table>
<?php
$data = $_POST['subjectname'];
$dat = $_POST['subjectcode'];

echo "$data";
echo "$dat";
?>