<?php

//Subjects
$subjects_result = mysqli_query($conn,'SELECT * FROM subjects');
$subjects = mysqli_fetch_all($subjects_result, MYSQLI_ASSOC);
if(isset($_POST['add_subject']))
{
	$subject = $_POST['subject'];
	$add_subject = "INSERT INTO subjects(SUBJECT) VALUES('$subject')";
	mysqli_query($conn, $add_subject);
	header("Location: AdminHome.php");
}

//Tests
$tests_result = mysqli_query($conn,'SELECT * FROM test');
$tests = mysqli_fetch_all($tests_result, MYSQLI_ASSOC);

//New-test
if(isset($_POST['add_test']))
{
	$test_name = $_POST['test_name'];
	$subject = $_POST['subject'];
	$sdatetime = $_POST['sdatetime'];
	$edatetime = $_POST['edatetime'];
	$test_duration = $_POST['test_duration'];
	$attempts = $_POST['attempts'];
	$yes_no = $_POST['yes_no'];
	$add_test = " INSERT INTO test(SUBJECT, TEST_NAME, SDATETIME, EDATETIME, TEST_DURATION, ATTEMPTS, YES_NO) VALUES('$subject', '$test_name', '$sdatetime', '$edatetime', '$test_duration', '$attempts', '$yes_no')";
	mysqli_query($conn,$add_test);
	header("Location: AdminHome.php");
}

//Search-users
$searchusers_result = mysqli_query($conn,'SELECT * FROM users');
$usernames = mysqli_fetch_all($searchusers_result, MYSQLI_ASSOC);

//settings

?>
<!------------------------Subjects------------------------->
<div id="subjects" class="tab-pane in fade active" align="center">
	<h3 class="text-dark" style="font-size: 50px;">SUBJECTS</h3>
	<p style="font-size: 17px;"><i>Please enter the subject name in capital letters</i></p>
	<hr style="border: 6px solid green; border-radius: 5px;">
	<ul class="list-group">
	<?php foreach($subjects as $subject) : ?>
		<li class="list-group-item">
			<?php echo $subject['SUBJECT']; ?>
		</li>
	<?php endforeach; ?>
	</ul>
	<hr style="border: 6px solid green; border-radius: 5px;">
	<br><br>
	<form method="post" action="">
		<input class="form-control" type="text" name="subject" placeholder="Add New Subject"><br>
		<input type="submit" name="add_subject" value="Add" class="btn btn-danger btn-block">
	</form>
</div>
<!------------------------Tests------------------------->
<div id="tests" class="tab-pane fade">
	<h3 class="text-dark" style="font-size: 50px;" align="center">Tests</h3>
	<hr style="border: 3px solid indigo; border-radius: 6px;">
    <table class="table"  style="font-size: 16px;">
        <thead>
            <tr>
                <th>Test Name</th>
                <th>Subject</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Add Questions</th>
				<th>Evaluate Test</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
            <tr>
                <td><?php echo $test['TEST_NAME'];?></td>
                <td><?php echo $test['SUBJECT']; ?></td>
                <td><?php echo $test['SDATETIME']; ?></td>
                <td><?php echo $test['EDATETIME']; ?></td>
                <td><a href='EditTest.php?var=<?php echo $test['TEST_ID']; ?> ' class="btn btn-success">Add Question</a></td>
				<td><a href='EvaluateTest.php?var=<?php echo $test['TEST_ID']; ?> ' class="btn btn-danger">Evaluate</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!------------------------Create Test------------------------->
<div id="new-test" class="tab-pane fade" >
    <h3 class="text-dark" style="font-size: 50px;" align="center">CREATE TEST</h3>
    <hr style="border: 5px solid gray; border-radius: 5px;">
    <br>
    <form method="post" action="">
	    <div class="form-group">
		    <input class="form-control" type="text" name="test_name" placeholder="Test Name">
	    </div>
	    <div class="form-group">
	        <select name="subject" class="form-control" id="sel1">
	            <option disabled>Select Subject</option>
	     		    <?php foreach($subjects as $subject) : ?>
	        		    <option value="<?php echo $subject['SUBJECT']; ?>"><?php echo $subject['SUBJECT']; ?></option>
	        	    <?php endforeach; ?>
	        </select>
	    </div>
	    <div class="form-inline form-group">
	        <input class="form-control" type="datetime-local" name="sdatetime" style="width: 693px;">&nbsp;&nbsp;Start Date and Time
        </div>
	    <div class="form-inline form-group">
		    <input class="form-control" type="datetime-local" name="edatetime" style="width: 693px;">&nbsp;&nbsp;End Date and Time
	    </div>
	    <div class="form-group">
		    <input class="form-control" type="number" name="test_duration" placeholder="Duration in Minutes">
	    </div>
	    <div class="form-group">
		    <input class="form-control" type="number" name="attempts" placeholder="No. of Attempts allowed">
	    </div>
	    <div class="form-group">
	        <select name="yes_no" class="form-control" id="sel1">
	     	    <option disabled>Show Immediate Results</option>
	     	    <option>Yes</option>
	     	    <option>No</option>
	        </select>
	    </div>
        <br>
	    <input type="submit" name="add_test" value="Create Test" class="btn btn-danger btn-block" style="height: 40px;">
    </form><br>
    <p style="font-size: 16px;">* Note: After creating test go to Tests to add questions.</p>
</div>
<!------------------------Search User------------------------->
<div id="search-users" class="tab-pane fade">
    <h3 class="text-dark" style="font-size: 50px;" align="center">SEARCH USER</h3>
    <hr style="border: 5px solid gray; border-radius: 5px;"><br>
    <div class="search-box"  align="center">
        <form class="form-inline" style="padding:0;">
            <input class="form-control" type="text" autocomplete="off" placeholder="Search users..." style="width:720px;">
            <br><br>
            <input type="submit" name="search_user" value="Search" class="btn btn-success" style="width:150px;">
            <div class="result-display" style="cursor: pointer;"></div>
        </form>
        <hr style="border: 5px solid gray; border-radius: 5px;">
    </div>
    <br>
	<table class="table" style="font-size: 16px;">
		<thead>
			<tr>
				<th>Sr No.</th>
				<th>User Name</th>
				<th>Email Id</th>
				<th>View Test Results</th>
				<th>Delete User</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach($usernames as $username) : ?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $username['USER_NAME']; ?></td>
				<td><?php echo $username['EMAIL_ID']; ?></td>
				<td><a class="btn btn-info" href='ViewProfile.php?user_id= <?php echo $username['USER_ID']; ?> ' >View Results<a></td>
				<td><a href='DeleteUser.php?user_id= <?php echo $username['USER_ID']; ?> ' class="btn btn-danger">Delete User</a></td>
			</tr>
		    <?php $i++; endforeach; ?>
		</tbody>
    </table>
</div>
<!------------------------Settings------------------------->
<!-----------fix later------->
<div id="settings" class="tab-pane fade"> 
	<h3 class="text-dark" style="font-size: 50px;" align="center">SETTINGS</h3>
	<hr style="border: 5px solid gray; border-radius: 5px;">
	<div>
	<form class="form-inline">
		<div class="form-group">
			<label>Password :</label>&nbsp;
			<input class="form-control" type="password" name="password" placeholder="Password" style="width: 700px;">
		</div><br>
		<div class="form-group">
			<label>New Password :</label>&nbsp;
			<input class="form-control" type="password" name="new_password" placeholder="New Password" style="width: 669px;">
		</div><br>
		<div class="form-group">
			<label>Confirm New Password :</label>&nbsp;
			<input class="form-control" type="password" name="conf_new_password" placeholder="Confirm New Password" style="width: 616px;">
		</div><br><br>
		<div class="form-group">
			<input class="btn btn-success btn-block" type="submit" name="change_password" value="Change Password">
	    </div>
	</form>
    </div>
    <div>
	<form class="form-inline">
		<div class="form-group">
			<label>Add new role :</label> 
			<input class="form-control" type="text" name="username" placeholder="Name">
		</div><br>
		<div class="form-group">
			<label>Password :</label> 
			<input class="form-control" type="password" name="password" placeholder="Password">
		</div><br>
		<div class="form-group">
			<label>Role :</label> 
			<select class="form-control" name="role">
				<option>Admin</option>
				<option>Instructor</option>
				<option>User</option>
			</select>
		</div>
		<br>
		<input class="btn btn-danger" type="submit" name="add_role" value="Save">
	</form>
	</div>
</div>