<?php
include("config.php");
$uid = $_GET['id'];

// view code//
$sql = "UPDATE users SET deleted_at = NOW() , status='inactive' WHERE id = {$uid}";
$result = mysqli_query($con, $sql);
if ($result) {
	$img = '';
} else {
	echo "Error: " . mysqli_error($con);
}

//end view code
//$msg="";
//$sql = "DELETE FROM users WHERE uid = {$uid}";
//$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>User Deleted</p>";
	header("Location:userlist.php?msg=$msg");
}
else
{
	$msg="<p class='alert alert-warning'>User not Deleted</p>";
		header("Location:userlist.php?msg=$msg");
}

mysqli_close($con);
?>
