<?php require'Connection.php' ?>

<?php

error_reporting(0);
$test_id=$_GET['var'];
$t_query=mysqli_query($conn,"SELECT * FROM test WHERE TEST_ID='$test_id' ");
$t_result=mysqli_fetch_array($t_query, MYSQLI_ASSOC);
$q_query=mysqli_query($conn,"SELECT * FROM questions WHERE TEST_ID='$test_id' ");
$q_result=mysqli_fetch_all($q_query, MYSQLI_ASSOC);

if(isset($_POST['add_question']))
{
	$question = mysqli_real_escape_string($conn,$_POST['question']);
	$target_dir = "Questions/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$option_a = $_POST['option_a'];
	$option_b = $_POST['option_b'];
	$option_c = $_POST['option_c'];
	$option_d = $_POST['option_d'];
	$answer = $_POST['answer'];
	$add_question = "INSERT INTO questions(TEST_ID, QUESTION, IMAGE, OPTION_A, OPTION_B, OPTION_C, OPTION_D, ANSWER) VALUES('$test_id' ,'$question', '$target_file', '$option_a', '$option_b', '$option_c',' $option_d', '$answer') ";
	mysqli_query($conn,$add_question);
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	header("Location: Question.php?var="+$test_id);
}

if(isset($_POST["add_desc_question"]))
{
	$question_desc = mysqli_real_escape_string($conn,$_POST['question_desc']);
	$target_dir = "Questions_desc/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	mysqli_query($conn,"INSERT INTO questions_desc(TEST_ID, QUESTION, IMAGE) VALUES('$test_id', '$question_desc','$target_file')");
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	header("Location: Question.php?var="+$test_id);
}

if(isset($_POST['update_test']))
{
	$test_name = $_POST['test_name'];
	$sdatetime = $_POST['sdatetime'];
	$edatetime = $_POST['edatetime'];
	$test_duration = $_POST['test_duration'];
	$update_test = " UPDATE test SET TEST_NAME = '$test_name', SDATETIME = '$sdatetime', EDATETIME = '$edatetime', TEST_DURATION = '$test_duration' WHERE TEST_ID = '$test_id' ";
	mysqli_query($conn,$update_test);
	print_r($update_test);
	header("Location: Question.php?var="+$test_id);
}

if(isset($_POST['edit_question']))
{
	$question = mysqli_real_escape_string($conn,$_POST['question']);
	$question_id = $_POST['question_id'];
	$target_dir = "Questions/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$option_a = $_POST['option_a'];
	$option_b = $_POST['option_b'];
	$option_c = $_POST['option_c'];
	$option_d = $_POST['option_d'];
	$answer = $_POST['answer'];
	$edit_question = "UPDATE questions SET QUESTION = '$question', IMAGE = '$target_file', OPTION_A = '$option_a', OPTION_B = '$option_b', OPTION_C = '$option_c', OPTION_D = '$option_d', ANSWER = '$answer' WHERE QUESTION_ID = '$question_id' ";
	mysqli_query($conn,$edit_question);
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	header("Location: Question.php?var="+$test_id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <!------------------Title--------------------->
	<title>RABS-OEP EditTest</title>
	<link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="JS/Javascript.js"></script>
</head>

<body>

    <div class="container">
    	<br><br>
        <!---------------------------Header------------------------------------->
        <div>
            <h1 align="center" class="text-danger"><b style="font-size: 50px;">UPDATE TEST SETTINGS</b></h1>
            <br><br>
            <p>NOTE : Refresh the page After Insertion And Updation</p>
            <hr style="border: 3px solid yellow; border-radius: 6px;">
            <h4 style="font-size: 21px;">TEST NAME: <?php echo $t_result['TEST_NAME'] ?> </h4>
            <h4 style="font-size: 21px;">SUBJECT: <?php echo $t_result['SUBJECT'] ?></h4>
            <hr style="border: 3px solid yellow; border-radius: 6px;">
            <br><br>
        </div>
        <a href="AdminHome.php" class="scroll" style="left:10px; top:10px; position:fixed;">
      	    <i class="fa fa-close fa-3x"></i>
        </a>
        <!------------------------------Add Multiple Choice Questions---------------------------------------->
        <h2 class="btn btn-success" data-toggle="collapse" data-target="#add" style="height: 40px; width:100%;"><b style="font-size: 20px;">ADD MULTIPLE CHOICE QUESTION</b></h2>
        <br><br><br>
        <div id="add" class="collapse">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" name="question" placeholder="Question" style="width: 1100px;" required></textarea>
                </div>
				<div class="form-group form-inline">
                    <input class="form-control" type="file" name="image" style="width: 300px;">&nbsp;&nbsp;Add Image
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="text" name="option_a" placeholder="Option A" style="width: 550px;">
                    <input class="form-control" type="text" name="option_b" placeholder="Option B" style="width: 550px;">
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="text" name="option_c" placeholder="Option C" style="width: 550px;">
                    <input class="form-control" type="text" name="option_d" placeholder="Option D" style="width: 550px;">
                </div>
                <div class="form-group form-inline" >
				    <select name="answer" class="form-control" placeholder="Answer Option" style="width: 300px;" required>
				     	<option value="a">a</option>
				     	<option value="b">b</option>
						<option value="c">c</option>
				     	<option value="d">d</option>
				    </select>&nbsp;&nbsp;Correct Answer
                </div>
                <br>
                <input type="submit" name="add_question" value="Add Question" class="btn btn-danger" style="height: 40px; width:300px;">
            </form>
            <br>
        </div>
        <!------------------------------Add Descriptive Questions--------------------------------------->
		<h2 class="btn btn-primary" data-toggle="collapse" data-target="#add_desc" style="height: 40px; width:100%; font-size: 20px;">ADD DESCRIPTIVE QUESTION</h2>
		<br><br><br>
		<div id="add_desc" class="collapse">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" name="question_desc" placeholder="Question" style="width: 1100px;" required></textarea>
                </div>
                <div class="form-group form-inline">
                    <input class="form-control" type="file" name="image" style="width: 300px;">&nbsp;&nbsp;Add Image
                </div>
                <br>
                <input type="submit" name="add_desc_question" value="Add Question" class="btn btn-danger" style="height: 40px; width:300px;">
            </form>
            <br>
        </div>
        <!------------------------------Update Test Settings--------------------------------------->
        <h2 class="btn btn-info" data-toggle="collapse" data-target="#update" style="height: 40px; width:100%; font-size: 20px;">UPDATE TEST SETTINGS</h2>
        <br><br><br>
        <div id="update" class="collapse">
            <form method="post" action="">
                <div class="form-inline form-group">
                    <input class="form-control" type="text" name="test_name" value="<?php echo $t_result['TEST_NAME'] ?>" style="width: 300px;">&nbsp;&nbsp;Test Name
                </div>
                <div class="form-inline form-group">
                    <input class="form-control date" type="datetime-local" name="sdatetime" style="width: 300px;" value= <?php echo date('Y-m-d\Th:i', strtotime($t_result['SDATETIME']) ); ?> >&nbsp;&nbsp;Start Date and Time&nbsp;&nbsp;[ START: <?php echo $t_result['SDATETIME'] ?> ]
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="datetime-local" name="edatetime"  style="width: 300px;" value=<?php echo date('Y-m-d\Th:i', strtotime($t_result['EDATETIME']) ); ?> >&nbsp;&nbsp;End Date and Time&nbsp;&nbsp;[ STOP: <?php echo $t_result['EDATETIME'] ?> ]
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="number" name="test_duration" value="<?php echo $t_result['TEST_DURATION'] ?>" style="width: 300px;">&nbsp;&nbsp;Test Duration
                </div>
                <br>
                <input type="submit" name="update_test" value="Update Test" class="btn btn-danger" style="height: 40px; width:300px;">
            </form>
            <br>
        </div>
        <!------------------------------Edit Question Details--------------------------------------->
        <h2 class="btn btn-danger" data-toggle="collapse" data-target="#edit" style="height: 40px; width:100%; font-size: 20px;">EDIT QUESTION DETAILS</h2>
        <br><br>
        <div id="edit" class="collapse">
            <?php foreach ($q_result as $q_res): ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="form-control" name="question" style="width: 1100px;" required><?php echo $q_res['QUESTION'] ?></textarea>
                </div>
			    <div class="form-group form-inline">
                    <input class="form-control" type="file" name="image" style="width: 300px;">&nbsp;&nbsp;Add Image
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="text" name="option_a" value="<?php echo $q_res['OPTION_A'] ?>" style="width: 550px;">
                    <input class="form-control" type="text" name="option_b" value="<?php echo $q_res['OPTION_B'] ?>" style="width: 550px;">
                </div>
                <div class="form-inline form-group">
                    <input class="form-control" type="text" name="option_c" value="<?php echo $q_res['OPTION_C'] ?>" style="width: 550px;">
                    <input class="form-control" type="text" name="option_d" value="<?php echo $q_res['OPTION_D'] ?>" style="width: 550px;">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="answer" value="<?php echo $q_res['ANSWER'] ?>" style="width: 300px;">
                </div>
                <input type="number" name="question_id" hidden value="<?php echo $q_res['QUESTION_ID'] ?>" >
                <br>
                <input type="submit" name="edit_question" value="Update Question" class="btn btn-danger" style="height: 40px; width:300px;">
            </form>
            <br>
            <hr style="border:3px solid black; border-radius: 6px;">
            <?php endforeach; ?>
        </div>
    </div>

  </body>
</html>