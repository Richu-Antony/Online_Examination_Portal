<?php require'Connection.php' ?>

<?php

  session_start();
  if(!isset($_SESSION['user_id']))
  {
  	header("Location: Index.php");
  }
  $test_id = $_GET['var'];
  //session_start();
  $_SESSION['test_id'] = $test_id;
  $query = mysqli_query($conn,"SELECT * FROM test WHERE TEST_ID='$test_id' ");
  $result = mysqli_fetch_array($query);
  $test_name=$result['TEST_NAME'];
  $test_duration=$result['TEST_DURATION'];
  $q_query=mysqli_query($conn,"SELECT * FROM questions WHERE TEST_ID='$test_id' ");
  $q_result=mysqli_fetch_all($q_query, MYSQLI_ASSOC);
  $desc_query=mysqli_query($conn,"SELECT * FROM questions_desc WHERE TEST_ID='$test_id' ");
  $desc_result=mysqli_fetch_all($desc_query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
  <!------------------Title--------------------->
	<title>RABS-OEP SolveTest</title>
  <link rel="icon" href="IMAGES/lightning.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/Stylesheet.css">
	<script type="text/javascript" src="JS/SolveTest.js"></script>
  <script>
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () 
      {
        history.pushState(null, null, document.URL);
      });
      $('form').data('serialize',$('form').serialize()); // On load save form current state
      $(window).bind('beforeunload', function(e)
      {
          if($('form').serialize()!=$('form').data('serialize'))return true;
          else e=null; // i.e; if form state change show warning box, else don't show it.
      });
  </script>
</head>

<body onLoad="timeout()">
  <div class="container">
    <script type="text/javascript">
    	var timeLeft = 60 * <?php echo $test_duration; ?>;
    </script><br>
    <div class="row" style="border:1px solid black;">
    	<div class="col-lg-8">
        <h1><?php echo $test_name; ?></h1>
      </div>
    	<div class="col-lg-2">
        <h2 id="time" style="float:right";></h2>
      </div>
    	<div class="col-lg-2">
        <h2>Minutes Left</h2>
      </div>
    </div><br>
    <ul class="nav nav-tabs">
      <li class="active">
        <a data-toggle="tab" data-target="#mcq">Multiple Choice Questions</a>
      </li>
      <li>
        <a data-toggle="tab" data-target="#desc">Descriptive Type Questions</a>
      </li>
    </ul>
    <form id="quiz" method="post" action="ShowResult.php">
      <div class="tab-content">
        <div id="mcq" class="tab-pane in fade active">
          <?php foreach ($q_result as $q_res): ?>
          <table class="table table-striped">
          	<thead>
          	  <tr>
          	    <th><?php echo $q_res['QUESTION'] ?></th>
          	  </tr>
          	</thead>
          	<tbody>
              <br>
              <tr>
               <?php
               if(strlen($q_res['IMAGE'])>10){ ?>
               <img src="<?php echo $q_res['IMAGE'] ?>" style="max-height:300px; max-width:400px;"></img><br>
               <?php  }?>
              </tr>
          	  <tr>
          	    <td>
                  <input type="radio" value="a" name="<?php echo $q_res['QUESTION_ID'] ?>">
          	      <?php echo $q_res['OPTION_A'] ?>
                </td>
          	  </tr>
          	  <tr>
                <td>
                  <input type="radio" value="b" name="<?php echo $q_res['QUESTION_ID'] ?>">
          	      <?php echo $q_res['OPTION_B'] ?>
                </td>
          	  </tr>
          	  <tr>
          	    <td>
                  <input type="radio" value="c" name="<?php echo $q_res['QUESTION_ID'] ?>">
          	      <?php echo $q_res['OPTION_C'] ?>
                </td>
          	  </tr>
          	  <tr>
          	    <td>
                  <input type="radio" value="d" name="<?php echo $q_res['QUESTION_ID'] ?>">
          	      <?php echo $q_res['OPTION_D'] ?>
                </td>
              </tr>
              <tr>
          	    <td>
                  <input type="radio" hidden checked="checked" value="none" name="<?php echo $q_res['QUESTION_ID'] ?>">
          	    </td>
          	  </tr>
          	</tbody>
          </table>
          <hr>
          <?php endforeach; ?>
        </div>
          
        <div id="desc" class="tab-pane fade">
          <?php foreach ($desc_result as $desc_res): ?>
            <h2><?php echo $desc_res['QUESTION'] ?></h2>
            <?php
            if(strlen($desc_res['IMAGE'])>10){ ?>
            <img src="<?php echo $desc_res['IMAGE'] ?>" style="max-height:300px;max-width:400px;"></img><br>
            <?php  }?>
            <textarea class="form-control" name="<?php echo $desc_res['QUESTION_ID'] ?>" placeholder="Write you code or answer here"></textarea>
            <hr>
          <?php endforeach; ?>
        </div>
      </div>
      <center>
        <input type="submit" name="submitTest" value="Submit Test" class="btn btn-danger" style="height: 40px; width:300px;">
      </center>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>