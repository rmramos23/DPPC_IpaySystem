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
    <link rel="stylesheet" href="..\resources/css/navbar.css">
    <link rel="stylesheet" href="..\resources/css/dashboard.css">

</head>
<body>
    <div class="navbar">
        <div class="navBarLeft-container">
            <div class="navBarLogo-container">
                <img src="..\resources/img/dppc_logo_nobg.png" alt="">
            </div>
            <div class="navBarlist">
                <div class="navBarDashboard-container">
                    <div class="navBarDashboard-button">
                        <p>DASHBOARD</p>
                    </div>
                </div>
                <div class="navBarPayroll-container">
                    <div class="navBarPayroll-button">
                        <p>PAYROLL</p>
                    </div>
                </div>
                <div class="navBarOvertime-container">
                    <div class="navBarOvertime-button">
                        <p>OVERTIME</p>
                    </div>
                </div>
                <div class="navBarLeave-container">
                    <div class="navBarLeave-button">
                        <p>LEAVE</p>
                    </div>
                </div>
                <div class="navBarRoster-container" onclick="location.href='roster.php'">
                    <div class="navBarRoster-button">
                        <p>ROSTER</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navBarRight-container">
            <div class="navBarLogout-container" id="navBarLogout" onclick="location.href='logout.php'">
                <div class="navBarLogout-button">
                    <p>LOGOUT</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>