<?php
    include_once 'config.php';
?>

<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $issue = $_POST['issue'];
    $date = $_POST['date'];

    if(isset($_POST['submitbtn'])){

        $sql = "INSERT INTO ticket VALUES('','$email','$name','$subject','$type','$issue','$date')";

        if($conn->query($sql)){

            header('location: student main.html');
            
        }
        else{
            echo "<script>alert('unsuccessful!')</script>";
        }

    }

    mysqli_close($conn);
?>