<?php
	session_start();
    if(isset($_SESSION['user_id']))
    {
        session_destroy();
        header("Location: index.php");
    }
		if(isset($_SESSION['admin_id']))
    {
        session_destroy();
        header("Location: admin.php");
    }
?>
