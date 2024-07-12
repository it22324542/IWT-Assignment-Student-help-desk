<?php
   
    include_once 'config.php';

    if(isset($_POST['submitbtn'])){
        
        $name = mysqli_real_escape_string($conn,$_POST['userName']);
        $address = $_POST['userAddress'];
        $phone = $_POST['userPhone'];
        $dob = $_POST['userDOB'];
        $faculty = $_POST['faculty'];
        $gender = $_POST['gender'];
        $email = $_POST['userEmail'];
        $pwd = $_POST['userPwd'];
        $apwd = $_POST['again'];
        $HASHEDpwd = password_hash($_POST['userPwd'],PASSWORD_DEFAULT);

        $sql = "SELECT * FROM student WHERE email = '$email'";

        $result = mysqli_query($conn, $sql); //run the query

        if(mysqli_num_rows($result) > 0){

            $error[] = "user already exist!";
        }
        else{

            if($pwd != $apwd){

                $error[] = "password not matched";

            }

            else{
                
                $input = "INSERT INTO student VALUES ('','$name','$address','$phone','$dob','$faculty','$gender','$email','$HASHEDpwd')";

                mysqli_query($conn,$input);

                header('location: login.php');

            }

        }

    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <section class="container">
        <header>Registration Form</header>
        <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<strong class="errorMsg">'.$error.'</strong>';
                    };
                };
            ?>
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" id="userName" name="userName"  required/>
            </div>

            <div class="input-box">
                <label>Address</label>
                <input type="text" placeholder="Enter Address" id="userAddress" name="userAddress" required/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" placeholder="Enter phone number" id="userPhone" name="userPhone" required/>
                </div>
            
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" placeholder="Enter birth date"id="userDOB" name="userDOB" required/>
                </div>    
            </div>

            <br><br>

            <label for="faculty">Choose Faculty</label>

            <select name="faculty" id="faculty">
              <option value="Computing">Computing</option>
              <option value="Engineering">Engineering</option>
              <option value="SLIIT Business School">SLIIT Business School</option>
              <option value="Humanities & Sciences">Humanities & Sciences</option>
              <option value="School of Architecture">School of Architecture</option>  
              <option value="Law">Law</option>
            </select>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="male" checked/>
                        <lable for="check">Male</lable>
                    </div>

                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="Female" />
                        <lable for="check">Female</lable>
                    </div>
                </div>
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="text" placeholder="Enter Email Address" id="userEmail" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter Password" id="userPwd" name="userPwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
            </div> 
            <br>
            
            <div class="input-box">
                <label>Enter again</label>
                <input type="password" placeholder="Enter Password" id="again" name="again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
            </div> 
            <br><br>

            <center>
                <input type="submit" value="Submit" name="submitbtn">
                <input type="button" value="Cancel">
            </center>
                
        </form>
    </section>
</body>
</html>
