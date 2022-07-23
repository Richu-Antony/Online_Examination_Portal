<?php require'Connection.php' ?>

<?php

session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: Index.php");
}
$user_id = $_SESSION['user_id'];
$query_user = mysqli_query($conn,"SELECT USER_NAME, EMAIL_ID, PHONE_NO FROM users WHERE USER_ID='$user_id' ");
$results_user = mysqli_fetch_array($query_user, MYSQLI_ASSOC);
$query = mysqli_query($conn,"SELECT * FROM test_result WHERE USER_ID='$user_id' ");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
$query_test = mysqli_query($conn,"SELECT TEST_ID, TEST_NAME, SUBJECT FROM test ");
$results_test = mysqli_fetch_all($query_test, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>RABS-OEP StudentProfile</title>
	<link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/">
</head>

<body>
	<!-----------navbar--------------->
	<nav class="navbar navbar-inverse" style="font-size: 20px;">
		<div class="container-fluid">    
		    <div class="navbar-header">
		        <a class="navbar-brand" href="StudentHome.php"><b>RABS - OEP</b></a>
		    </div>
		    <ul class="nav navbar-nav">
		        <li>
		            <a href="StudentHome.php">Home</a>
		        </li>
		        <li class="active">
		            <a href="StudentProfile.php">Profile</a>
		        </li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		        <li>
		            <a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
		        </li>
		    </ul>
		</div>
    </nav>
    <!-----------Content------------->
    <div class="container">
    	<hr style="border: 4px solid red; border-radius: 3px;">
		<h3>Name : <?php echo $results_user['USER_NAME'];?></h3>
		<h3>Email : <?php echo $results_user['EMAIL_ID'];?></h3>
		<h3>Phone No : <?php echo $results_user['PHONE_NO'];?></h3>
		<hr style="border: 4px solid red; border-radius: 3px;">
		<table class="table" style="font-size: 18px;">
            <thead>
                <tr>
					<th>Sr No.</th>
					<th>Subject</th>
					<th>Test Name</th>
                    <th>Total Questions</th>
                    <th>Correct Answers</th>
                    <th>Wrong Answers</th>
                    <th>Not Attempted</th>
                    <th>Score</th>
					<th>Descriptive Questions Score</th>
                </tr>
            </thead>
            <tbody>
				<?php $i=1; foreach ($results as $res): ?>
                <tr>
					<td>
						<?php echo $i; ?>
				    </td>
					<?php foreach ($results_test as $result_test): ?>
					<?php if($res['TEST_ID']==$result_test['TEST_ID'])
					{
					  echo '<td>'.$result_test['SUBJECT'].'</td>';
					  echo '<td>'.$result_test['TEST_NAME'].'</td>';
					}
					?>
				<?php endforeach; ?>
                    <td><?php echo ($res['RIGHT_ANS']+$res['WRONG_ANS']+$res['NO_ATTEMPT']); ?></td>
                    <td><?php echo $res['RIGHT_ANS']; ?></td>
                    <td><?php echo $res['WRONG_ANS']; ?></td>
                    <td><?php echo $res['NO_ATTEMPT']; ?></td>
                    <td><?php echo number_format((float) $res['SCORE'],2, '.', '').' %'; ?></td>
					<?php $result_id=$res['RESULT_ID'];
					$marks_q=mysqli_query($conn,"SELECT SUM(MARKS) FROM test_result_desc WHERE RESULT_ID='$result_id' ");
					while($row = mysqli_fetch_array($marks_q))
					{
       				  $marks= $row['SUM(MARKS)'];
					}
					?>
					<td><?php echo $marks; ?></td>
                </tr>
				<?php $i++; endforeach; ?>
            </tbody>
        </table>
	</div>
</body>

</html>