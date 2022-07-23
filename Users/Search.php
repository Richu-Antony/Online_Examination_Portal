<?php require'Connection.php' ?>

<?php
if(isset($_REQUEST['term']))
{
    $sql = "SELECT * FROM users WHERE USER_NAME LIKE ?";
    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        $param_term = $_REQUEST['term'] . '%';
        if(mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    echo "<br><br>";
                    echo "<p>" . $row["USER_NAME"] . "</p>";
                }
            } 
            else
            {
                echo "<br><br>";
                echo "<p>No matches found</p>";
            }
        }
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
}

?>