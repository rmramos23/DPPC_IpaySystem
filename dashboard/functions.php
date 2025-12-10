<?php

function check_login($con)
{
    if(isset($_SESSION['userId']))
    {
        $userId = $_SESSION['userId'];
        $query = "SELECT * FROM employee where userId = '$userId' limit 1";
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
 
function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }
    $len = rand(4, $length);
    for ($i=0; $i < $len; $i++)
    {
        $text .= rand(0,9);
    }
    return $text;
}
function check_timekeeping($con)
{
    $Id = $_SESSION['userId'];
    //check for data in timekeeping table if user hase time in
    $query = "select * from timekeeping where userId = '$Id' and officeDate = CURDATE() LIMIT 1";
    $result = mysqli_query($con, $query);
    if(!isset($result) || mysqli_num_rows($result) == 0)
    {
        //no timekeeping data for today

    $timekeeping = array('timeIn' => null,'timeOut' => null);
        // echo "TimeIn: " . $timekeeping['timeIn'];
        return $timekeeping;
    }
    else
    {
        $timekeeping = mysqli_fetch_assoc($result);
        // echo "TimeIn: " . $timekeeping['timeIn'];
        return $timekeeping;
    }

}
