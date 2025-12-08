<!-- <?php
session_start();
    include("connection.php");
    include("functions.php");

    // $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $query = "select * from employee where userName = '$userName' limit 1";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] === $password)
            {
                $_SESSION['userName'] = $user_data['userName'];
                header("Location: index.php");
                die;
            }

        }
        echo "Wrong username or password!";



    }
?> -->

<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" href="..\resources/css/login.css">
    <script src="..\resources/javascript/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>



<body>
    <div class="dplogo">
    
            <img src="..\resources/img/dppc_logo_nobg.png" alt="">
    </div>
    <div class="container">
        <div class="container-left">
            <img src="..\resources/img/dppc_logo_nobg.png" alt="">
        </div>
        <div class="container-divider">
            
        </div>
            <div class="container-right">
                <form method="post">
                    <div class="title">
                        <p>iPay System</p>
                    </div>
                    <div class="username-container">
                        <p>Username</p>
                        <input type="text" name="userName" >
                    </div>
                    <div class="password-container">
                        <p>Password</p>
                        <input type="password" name="password" class="password-input">
                    </div>
                    <div class="login-container">
                        <input type="submit" value="Login" class="login-button">
                    </div>
                </form>
            </div>
    </div>

</body>
</html>