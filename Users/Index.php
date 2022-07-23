<?php require 'Connection.php' ?>

<?php  

session_start();
if(isset($_SESSION['user_id']))
{
	header("location: StudentHome.php");
}

if(isset($_POST['signin'])) 
{
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $result = mysqli_query($conn, "SELECT * FROM users WHERE USER_NAME='$username'");
   $row = mysqli_fetch_array($result);
   $count = mysqli_num_rows($result);
   if($count == 1 && $row['PASSWORD']==MD5($password))
   {
    	session_start();
        $_SESSION['user_id'] = $row['USER_ID'];
        header("Location: StudentHome.php");
	}
	else
	{
        $errMSG = "Incorrect Credentials, Try again...";
    }
}

if(isset($_POST['signup'])) 
{
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
	$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
	$result = mysqli_query($conn, "SELECT EMAIL_ID FROM users WHERE EMAIL_ID='$email'");
	$count = mysqli_num_rows($result);
	if($count==1) 
	{
		$errMSG = "Email Id Already Exist";
	}
	elseif($password == $conf_password) 
	{
		$query = "INSERT INTO users(USER_NAME, EMAIL_ID, PASSWORD, PHONE_NO) VALUES('$username', '$email', MD5('$password'), '$phonenumber')";
		if(mysqli_query($conn, $query)) 
		{
			$errMSG = "Registered Successfully!";
		}
		else
		{
            echo 'ERROR: '. mysqli_error($conn);
        }
	}
	else
	{
        $errMSG = "Password doesn't match";  
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!------------------Title--------------------->
	<title>RABS OEP - USER</title>
    <link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
    <!------------------Style------------------->
    <link rel="stylesheet"  href="Index.css">
    <!------------------Bootstrap--------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!-------------------Font------------------------>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&display=swap">
</head>

<body>

<!-----------------------Header--------------------->
<section id="header">
	<nav class="navbar navbar-light">
    <a class="navbar-brand" href="#" id="logo-text">
  	   <img src="IMAGES/logo.svg" id="logo-img">RABS-OEP
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
  	    <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link effect-shine" href="Index.php">USER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link effect-shine" href="Admin.php">ADMIN</a>
            </li>
            <li class="nav-item">
               <a class="nav-link effect-shine" href="../home.html">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link effect-shine" href="../Help/Help.php">HELP & SUPPORT</a>
            </li>
        </ul>
    </div>
</section>

<!---------------------Heading---------------------------->
<section id="heading">
	<div class="container animate__animated animate__bounce">
	   <div class="text-center">
		   <h1 class="effect-shine">MULTI USER LOGIN PAGE</h1>
	   </div>
	</div>
</section>

<!---------------------Php Area--------------------------->
<section id="php_area">
    <div>&nbsp;
      <p>
        <center>
           <?php if(isset($cmsg)) 
           {
           	 echo "$cmsg";
           } ?>
        </center>
      </p>
    </div>
</section>

<!-----------------Content--------------------->
<section id="content">
	<div class="container">
	    <div class="row justify-content-center">
			<div class="col-lg-8 mt-5 px-0">
				<h3 class="text-center  p-3 animate__animated animate__heartBeat">
					<ul class="nav nav-pills nav-fill">
					  <li class="nav-item ml-auto active" style="padding-left:50px;">
						<a data-toggle="tab" href="#signin">LOGIN</a>
					  </li>
					  <li class="nav-item ml-auto"style=" padding-right:50px">
						<a data-toggle="tab" href="#signup">REGISTER</a>
					  </li>
                    </ul>
				</h3>				
				<div class="tab-content">
					<div id="signin" class="tab-pane fade show active">
						<form action="index.php" method="post" class="p-4">
							<div class="form-group">
								<label><b>Full Name : </b></label>
								<input type="text"  name="username" class="form-control form-control-lg" placeholder="Full name...">
							</div>
							<div class="form-group">
								<label><b>Password : </b></label>
								<input type="password" class="form-control form-control-lg" name="password" placeholder="Password...">
							</div>
							<div class="form-group">
								<input type="submit" name="signin" class="btn btn btn-warning btn-block" value="Sign In">
							</div>
						</form>
					</div>
					<div id="signup" class="tab-pane fade">
						<form action="index.php" method="post" class="p-4">
							<div class="form-group">
								<label><b>Full Name</b></label>
								<input class="form-control" type="text" name="username" placeholder="Full name..." maxlength="35" required>
							</div>
							<div class="form-group">
								<label><b>Email ID</b></label>
								<input class="form-control" type="email" name="email" placeholder="E-mail..." maxlength="40" required>
							</div>
							<div class="form-group">
								<label><b>Password</b></label>
								<input class="form-control" type="password" name="password" placeholder="Password..." maxlength="13" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters" required>
							</div>
							<div class="form-group">
								<label><b>Confirm Password</b></label>
								<input class="form-control" type="password" name="conf_password" placeholder="Confirm Password..." maxlength="13" required>
							</div>
							<div class="form-group">
                                <label><b>Contact No.</b></label>
                                <input type="tel" name="phonenumber" placeholder="Phone number..." class="form-control" pattern="[789][0-9]{9}" title="Use only numbers" maxlength="12" required>
                            </div>
							<div class="form-group">
								<input  type="submit" name="signup" class="btn btn-danger btn-block" value="Sign Up">
							</div>
						</form>
				    </div>
				</div>
				<br><center><span><?php if(isset($errMSG)){echo $errMSG;}?></span></center>
			</div>
		</div>
    </div>
</section>

<br><br><br>

</body>
</html>