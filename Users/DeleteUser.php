<?php require'Connection.php' ?>

<?php
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header("Location: Admin.php");
	}
	$user_id=$_GET['user_id'];
	mysqli_query($conn,"DELETE FROM users WHERE USER_ID='$user_id' ");
	mysqli_query($conn,"DELETE FROM test_result WHERE USER_ID='$user_id' ");
	mysqli_query($conn,"DELETE FROM test_result_desc WHERE USER_ID='$user_id' ");
	header("Location: AdminHome.php");
?>