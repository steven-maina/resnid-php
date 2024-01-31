<?php
include("config.php");
$aid = $_GET['id'];
$sql = "UPDATE users SET deleted_at = NOW() , status='inactive' WHERE id = {$aid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Admin Deactivated</p>";
	header("Location:adminlist.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Admin Not Deactivated</p>";
	header("Location:adminlist.php?msg=$msg");
}
mysqli_close($con);
?>
