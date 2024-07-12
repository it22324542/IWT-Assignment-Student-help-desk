<?php

    include_once 'config.php';

    if (isset($_POST['setpwd'])) {
        
        $email = $_POST['loginEmail'];
        $pwd = $_POST['newpwd'];
        $pwdagain = $_POST['newpwdagain'];

        $hashpwd = password_hash($_POST['newpwd'], PASSWORD_DEFAULT);

        if ($pwd === $pwdagain) {
            global $conn;
            $sql = "UPDATE staff SET password = '$hashpwd' WHERE email = '$email'";

            if ($conn->query($sql)) {
                echo "<script>alert('Password SET!')</script>";
            } else {
                echo "<script>alert('Failed!')</script>";
            }
        } 
        
        else {
            echo "<script>alert('Passwords do not match!')</script>";
        }
    }

    $conn->close();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>Update password</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="center">
            <h1>Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="txt_field">
                    <input type="text" name="loginEmail" id="loginEmail" namerequired>
                    <span></span>
                    <label>Email</label>
                </div>

                <div class="txt_field">
                    <input type="password" name="newpwd" id="newpwd" required>
                    <span></span>
                    <label>New Password</label>
                </div>

                <div class="txt_field">
                    <input type="password" name="newpwdagain" id="newpwdagain" required>
                    <span></span>
                    <label>Enter the new password</label>
                </div>
                
                <input type="submit" value="SET" name="setpwd">
                <div class="signup_link">
                  Not a member? <a href="registration.php">Signup</a> 
                </div>      

            </form>
        </div>
    </body>





</html>