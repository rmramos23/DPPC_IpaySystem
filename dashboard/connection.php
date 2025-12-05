<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dppc";




if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect to database!");
}
