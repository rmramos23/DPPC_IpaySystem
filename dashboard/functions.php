<?php

function check_login($con)
{
    if(isset($_SESSION['userName']))
    {
        $id = $_SESSION['userName'];
        $query = "SELECT * FROM employee where userName = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            // return $resutl
        }
    }

    ///redirect to login
    header("Location: login.php");
    die;
}


