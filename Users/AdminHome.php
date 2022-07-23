<?php require 'Connection.php' ?>

<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
	header("Location: Admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!------------------Title--------------------->
	<title>RABS-OEP - ADMIN</title>
    <link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
    <!------------------Style------------------->
    <link rel="stylesheet" href="CSS/AdminHome.css">
    <!------------------Bootstrap--------------->
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-----------------Script------------------>
    <script type="text/javascript" src="JS/SearchUser.js"></script>
  
<body>

<!----------------Sidebar---------------->
<div class="wrapper">
    <div class="sidebar">
        <h2>RABS - OEP</h2>
        <ul>
            <li class="active">
            	<a href="#subjects" data-toggle="tab">
            	<i class="bx bxs-coin-stack bx-spin"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBJECTS
                </a>
            </li>
            <li>
            	<a href="#tests" data-toggle="tab">
            	<i class='bx bxs-badge-check bx-tada'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TESTS
                </a><i  ></i>
            </li>
            <li>
            	<a href="#new-test" data-toggle="tab">
            	<i class="bx bxs-add-to-queue bx-flashing"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADD TEST
                </a>
            </li>
            <li>
            	<a href="#search-users" data-toggle="tab">
            	<i class="bx bx-search-alt bx-tada"></i>&nbsp;&nbsp;&nbsp;&nbsp;SEARCH USERS
                </a>
            </li>
            <li>
            	<a href="#settings" data-toggle="tab">
            	<i class="bx bxs-wrench bx-fade-down"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SETTINGS
                </a>
            </li>
            <li>
            	<a href="Logout.php">
            	<i class='bx bx-log-out bx-flashing'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT
                </a>
            </li>
        </ul> 
        
    </div>

    <div class="main_content">
        <div class="header"><b>Welcome!! Admin</b></div>
        <div class="info">
            <div id="content" class="col-md-8">
    			<div class="tab-content">		
    				<?php include"AdminHomeContent.php" ?>
    			</div>
    		</div>
        <div>
    </div>

</div>

</body>
</html>