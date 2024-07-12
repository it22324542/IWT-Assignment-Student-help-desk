<?php
    include_once 'config.php';
    session_start();
?>

<?php
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    $message = $_POST['message'];

    

    if(isset($_POST['submitbtn'])){

        $sql = "INSERT INTO feedback VALUES('','$name','$email','$message')";

        if($conn->query($sql)){

            echo "<script>alert('Insert successful')</script>";
        }
        else{
            
            echo "<script>alert('Insert failed')</script>";
        }
    }

    $conn->close();
    
?>