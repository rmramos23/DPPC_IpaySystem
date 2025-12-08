<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome!!! <br>sakses sirrr <?php echo $user_data['firstName'];?>!</h1>
    <a href="timekeeping.html">logout</a>
</body>
</html>