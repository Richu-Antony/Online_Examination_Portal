<?php
$conn = mysqli_connect('localhost', 'root', '', 'rabs_oep');

// Check connection
if(mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . "\n" . mysqli_connect_errno();
  exit();
}
else
{
	$cmsg = "RABS-OEP Server Connection Established....";
}
date_default_timezone_set('Asia/Kolkata');
?>