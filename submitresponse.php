<?php
    include_once 'config.php';
    session_start();
?>

<?php
    if(isset($_POST['submitresponse'])){

        $answer = $_POST['Response'];
        $ticketnum  = $_SESSION['ticketNumber'];
        $email = $_POST['email'];

        $sql = "INSERT INTO response VALUES('','$email','$answer','$ticketnum')";

        if($conn->query($sql))
        {
            echo "<script>alert('successful!')</script>";
        }

        header('location: staff ticketing page.php');
    }

    mysqli_close($conn);
?>