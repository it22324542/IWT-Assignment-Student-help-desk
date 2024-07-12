<?php
   
    include_once 'config.php';

    if(isset($_POST['submitbtn'])){
        
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $address = $_POST['address'];
        $phone = $_POST['mobile'];
        $email = $_POST['email'];
        $DOB = $_POST['DOB'];
        $position = $_POST['position'];
        $department = $_POST['select-box'];
        $startday = $_POST['startday'];
        $pwd = $_POST['password'];
        $HASHEDpwd = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $sql = "SELECT * FROM staff WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            $error[] = "user already exist!";
        }
        

        else{
                
            $input = "INSERT INTO staff VALUES ('','$fname','$lname','$address','$phone','$email','$DOB','$position','$department','$startday','$HASHEDpwd')";

            mysqli_query($conn,$input);

            header('location: loginstaff.php');

            }

        }

        mysqli_close($conn);
    
?>


<!DOCTYPE html>
<head>
<link rel="stylesheet" href="staffadding page.css">
</head>

<body>
<selection class="container">
    <header>New Member Registration</header><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
        
    
    <div class="column">
        <div class="input-box">
            <label>First Name</label>
            <input type="text"  name="fname" placeholder="Enter first name" required >
        </div><br><br>
        
        <div class="input-box">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter last name" required>
        </div>
    </div><br><br>

    <div class="input-box">
        <label>Address</label>
        <input type="address"  name="address" placeholder="Enter Address" required>
    </div><br><br>
    
    <div class="column">
       <div class="input-box">
          <label>contact number</label>
          <input type="phone" name="mobile" pattern="[0-9]{10}" placeholder="Enter phone number" required  >
       </div>
    
        <div class="input-box">
           <label>E-mail</label>
           <input type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" placeholder="Enter email"  required>
        </div>
   </div><br><br>

    <div class="column">
        <div class="input-box">
            <label>Date of Birth</label>
            <input type="date"  name="DOB" required>
        </div>    
    
        <div class="input-box">
            <label>Position</label>
            <input type="text" name="position" required>
        </div>
    </div><br><br>
    
    <label>Department</label>
    <div class="select-box">
        
        <select>
            <option  hidden> Select Department</option>
            <option value="StudentService"> Student Service</option>
            <option value="Humanresource"> Human Resource</option>
            <option value="Financedepartment"> Finance Department</option>
            <option value="FacultyCompofuting"> Faculty of Computing</option>
            <option value="FacultyofEngineering"> Faculty of Engineering</option>
            <option value="FacultyofHumanities and Sciences"> Faculty of Humanities and Sciences</option>
            <option value="businessschool">Business School</option>
        </select>
    </div><br><br>
        
        <div class="input-box">
            <label>Strat Date</label>
            <input type="date"  name="startday" required>
        </div><br><br>

        <div class="input-box">
            <label>password</label>
            <input type="text"  name="password" required>
        </div><br><br>
    </div>
    
    <div class="button">
        <input type="submit" name="submitbtn">
    </div>

</form>
</selection>
</body>
</html>