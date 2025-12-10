<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    check_credentials($user_data);
    // $user_data = check_login($con);
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $contactNumber = $_POST['contactNumber'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $dateHired = $_POST['dateHired'];
        $userId = random_num(20);
        $query = "insert into employee (userId, firstName, middleName, lastName, address, position, department, contactNumber, gender, birthday, dateHired) values ( '$userId', '$firstName', '$middleName', '$lastName', '$address', '$position', '$department', '$contactNumber', '$gender', '$birthday' ,'$dateHired')";
        mysqli_query($con, $query);
        
        //-add username and password using the new id, date -//

        $query = "SELECT * FROM employee WHERE userId = '$userId' limit 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
        $user_data = mysqli_fetch_assoc($result);
        $id = $user_data['id']; 
        // $userName = $user_date['dateHired'] .  $user_data['id'] 
        $userName = substr(date("Y", strtotime($dateHired)), -2) ."-". str_pad($id, 4, "0", STR_PAD_LEFT);
        $password = $userName;

        $query = "update employee set userName ='$userName', password = '$password' where userId = '$userId'";
        mysqli_query($con, $query);
        // echo "Username and Password for the new employee is: " . $userName;
        }
        else
        {
            // echo "Error updating username and password." . $userId;   
        }
        header("Location: dashboard.php");
        die;

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster</title>
    <link rel="stylesheet" href="..\resources/css/navbar.css">
    <link rel="stylesheet" href="..\resources/css/roster.css">
    <script src="..\resources/javascript/roster.js"></script>
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
    <!-- END OF NAVBAR -->


    <!-- END OF ROSTER LIST -->
    <div class="rosterAdd-popUp">
            <div class="rosterAddBackground-container" onclick="closeRosterAdd()">

            </div>
            <div class="rosterAdd-container">
                 <form method="post">
                    <div class="rosterAdd-form">
                        <div class="rosterAddFirstName-container">
                            <p>First Name</p>
                            <input type="text" name="firstName" required>
                        </div>
                        <div class="rosterAddMiddleName-container">
                            <p>Middle Name</p>
                            <input type="text"name="middleName" >
                        </div>
                        <div class="rosterAddLastName-container">
                            <p>Last Name</p>
                            <input type="text" name="lastName" required>
                        </div>
                        <div class="rosterAddAddress-container">
                            <p>Address</p>
                            <input type="text" name="address" required>
                        </div>

                        <div class="rosterAddPosition-container">
                            <p>Position</p>
                            <input type="text" name="position" required>
                        </div>
                        <div class="rosterAddDepartment-container" >
                            <p>Department</p>
                            <select name="department" id="" required>
                                <option value="Human Resources Development">Human Resources Development</option>
                                <option value="Logistic and Administration">Logistic and Administration</option>
                                <option value="Standard Compliance Section">Standard Compliance Section</option>
                                <option value="Quality Control and Assurance">Quality Control and Assurance</option>
                                <option value="Finance">Finance</option>
                                <option value="Production">Production</option>
                                <option value="Warehouse">Warehouse</option>
                                <option value="Product Development Group">Product Development Group</option>
                                <option value="Pollution Control Officer">Pollution Control Officer</option>
                                <option value="Planning / System">Planning / System</option>
                                <option value="Production Engineering">Production Engineering</option>
                            </select>
                        </div>
                        

                        <div class="rosterAddContactGender-container">
                            <div class="rosterAddContact-container">
                                <p>Contact</p>
                                <input type="text" name="contactNumber" id="" required>

                            </div>
                            <div class="rosterAddGender-container">
                                <p>Gender</p>
                                <select name="gender" id="" required>
                                    <option >Male</option>
                                    <option >Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="rosterAddDateHiredBirthday-container">
                            <div class="rosterAddDateHired-container">
                                <p>Date Hired</p>
                                <input type="date" name="dateHired" id="" required>

                            </div>
                            <div class="rosterAddBirthday-container">
                                <p>Birthday</p>
                                <input type="date" name="birthday" id="" required>
                            </div>
                        </div>

                    </div>
                    <div class="rosterAddSave-container">
                        <input type="submit" value="Add Employee" class ="rosterAddSave-button" name="addRosterForm">
                    </div>
                </form>
            </div>
  
    </div>

    <!-- END OF ROSTER ADD -->
     <!--END OF ROSTER VIEW -->

</body>
</html>