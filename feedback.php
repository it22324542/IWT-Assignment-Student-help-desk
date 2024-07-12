<?php
    include_once 'config.php';
    session_start();
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="feedback.css"/>
</head>

<body>
    <div class="form-container">
        <form action="submitfeedback.php" method="post">
           <h3> Give Your Feedback</h3> 
           <label>Name</label>
           <input type="text" name="name" placeholder="Enter your name"  required><br><br>
           <label>Student Email</label>
           <input type="email" name="email" placeholder="enter your email" value="<?php echo "$email";?>" disabled><br><br>
           <label>Your message</label>
           <textarea name="message" id="message" cols="28" rows="8" placeholder="type your message"></textarea><br>
           <input type="submit" value="submit" name="submitbtn">
        </form>
    </div>
</body>
</html>