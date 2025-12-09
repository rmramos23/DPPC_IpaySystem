<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
check_credentials($user_data);
// check if user is admin or not


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
    <a href="logout.php">logout</a>
</body>
</html>