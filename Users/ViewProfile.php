<?php require'Connection.php' ?>

<?php

error_reporting(0);
session_start();
if(!isset($_SESSION['admin_id']))
{
	header("Location: AdminHome.php");
}

$user_id = $_GET['user_id'];
$query = mysqli_query($conn,"SELECT * FROM test_result WHERE USER_ID='$user_id' ");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
$query_test = mysqli_query($conn,"SELECT TEST_ID,TEST_NAME,SUBJECT FROM test ");
$results_test = mysqli_fetch_all($query_test, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!------------------Title--------------------->
	<title>RABS-OEP ViewProfile</title>
	<link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/Stylesheet.css">
</head>

<body>
	<a href="AdminHome.php" class="scroll" style="left:10px;top:10px;position:fixed;">
		<i class="fa fa-close fa-3x"></i>
	</a>
	<br><br><br><br>
    <div class="container-fluid">
		<table class="table" style="font-size: 16px;">
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
                </tr>
            </thead>
            <tbody>
				<?php foreach ($results as $res): ?>
                <tr>
					<td>1</td>
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
                </tr>
				    <?php endforeach; ?>
            </tbody>
        </table>
	</div>
</body>

</html>