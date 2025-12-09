<?php

function check_login($con)
{
    if(isset($_SESSION['userName']))
    {
        $userName = $_SESSION['userName'];
        $query = "SELECT * FROM employee where userName = '$userName' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            // return $resutl
        }
    }
    else
    {    ///redirect to login
    header("Location: login.php");
    die;
        
    }

}

function check_credentials($user_data)
{
    
    // if($user_data['admin'] == '1')
    // {
    //     header("Location: dashboard.php");
    //     die;
    // }
    // else
    // {
        if(basename($_SERVER['PHP_SELF']) == "timekeeping.php")
        {
        // do nothing
        }
        else
        {
        header("Location: timekeeping.php");   
        die;
        }
    // }
}
