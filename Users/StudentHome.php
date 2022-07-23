<?php require'Connection.php' ?>

<?php

session_start();
if(!isset($_SESSION['user_id']))
{
	header("Location: Index.php");
}
$query = mysqli_query($conn,"SELECT * FROM test");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!------------------Title--------------------->
	<title>RABS-OEP STUDENT HOME</title>
	<link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/">
</head>

<body>
	<!------------------Nav bar--------------------->
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		    <a class="navbar-brand" href="StudentHome.php">RABS - OEP</a>
		</div>
		<ul class="nav navbar-nav">
		    <li class="active">
		    	<a href="StudentHome.php">Home</a>
		    </li>
		    <li>
		    	<a href="StudentProfile.php">Profile</a>
		    </li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		    <li>
		    	<a href="Logout.php">
		    		<span class="glyphicon glyphicon-log-in"></span> Logout
		    	</a>
		    </li>
		</ul>
    </div>
    </nav>
    <!-------------------Content--------------------->
    <div class="container">
		<h1>TESTS</h1>
			<div class="row">
				<div class="col-lg-7">

					<div id="active_test" class="well">
						<h3>Active Tests</h3>
						<table class="table">
							<thead>
							    <tr>
							        <th>Test Name</th>
							        <th>Subject</th>
							        <th>Ends on</th>
							        <th>Start Test</th>
							    </tr>
							</thead>
							<tbody>
							    <?php foreach ($results as $result):
								if((strtotime($result['SDATETIME']) <= strtotime(date("Y-m-d h:i:sa")))  && (strtotime($result['EDATETIME']) > strtotime(date("Y-m-d h:i:sa")))  ){ ?>
								<tr>
								    <td><?php echo $result['TEST_NAME'];?></td>
								    <td><?php echo $result['SUBJECT']; ?></td>
									<td><?php echo $result['EDATETIME']; ?></td>
								    <td>
								    	<a href="SolveTest.php?var=<?php echo $result['TEST_ID'];?>" class="btn btn-success">Start Test</a>
								    </td>
				                </tr>
								<?php } ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div id="active_test" class="well">
						<h3>Upcoming Tests</h3>
						<table class="table">
							<thead>
							    <tr>
							        <th>Test Name</th>
							        <th>Subject</th>
							        <th>Starts on</th>
							    </tr>
							</thead>
							<tbody>
							    <?php foreach ($results as $result):
							    if(strtotime($result['SDATETIME']) > strtotime(date("Y-m-d h:i:sa"))){ ?>
								<tr>
									<td><?php echo $result['TEST_NAME'];?></td>
								    <td><?php echo $result['SUBJECT']; ?></td>
									<td><?php echo $result['SDATETIME']; ?></td>
								</tr>
								<?php } ?>
							    <?php endforeach; ?>
							</tbody>
					    </table>
					</div>

				</div>

				<div class="col-lg-5">
					<div id="active_test" class="well">
						<h3>Past Tests</h3>
						<table class="table">
							<thead>
							    <tr>
							        <th>Test Name</th>
							        <th>Subject</th>
							        <th>Ended on</th>
							        <th>Check Results</th>
							    </tr>
							</thead>
							<tbody>
							    <?php foreach ($results as $result):
								if((strtotime($result['EDATETIME']) < strtotime(date("Y-m-d h:i:sa")))){ ?>
								<tr>
								    <td><?php echo $result['TEST_NAME'];?></td>
								    <td><?php echo $result['SUBJECT']; ?></td>
								    <td><?php echo $result['EDATETIME']; ?></td>
									<td><a href="" class="btn btn-primary">Summary</a></td>
							    </tr>
								<?php } ?>
								<?php endforeach; ?>
							</tbody>
					    </table>
					</div>
				</div>

			</div>
	</div>

</body>
</html>