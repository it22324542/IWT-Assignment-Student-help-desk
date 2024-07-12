<?php
    include_once 'config.php';

    if(isset($_POST['loginbtn'])){

        $email = $_POST['loginEmail'];
        $password = $_POST['loginPwd'];

        $sql = "SELECT * FROM staff WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $storedpwd = $row['password'];

            if(password_verify($password, $storedpwd))
            {
                header('location: staff main.html');
                exit();
            }
            else{
                echo "<script>alert('invalid password')</script>";
            }
        }
        else{
            echo "<script>alert('invalid email')</script>";
        }


    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>Staff Login Form</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="center">
            <h1>Staff Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="txt_field">
                    <input type="text" name="loginEmail" id="staffEmail" namerequired>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="loginPwd" id="staffpwd" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="pass"><a href="staffpasswordchange.php">Forgot Password?</a></div>
                <input type="submit" value="Login" name="loginbtn">
                <div class="signup_link">
                  Not a member? <a href="registration.php">Signup</a> 
                </div>      

            </form>
        </div>
    </body>





</html>