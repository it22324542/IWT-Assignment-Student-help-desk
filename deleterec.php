<?php
    include_once 'config.php';
?>

<?php
    if(isset($_POST['deletebtn'])){
        
        global $conn;

        $ticketID = $_POST["deleteR"];

        $sql = "DELETE FROM response WHERE ticket_ID ='$ticketID' ";

        if($conn->query($sql)){

            $sql = "DELETE FROM ticket WHERE ticket_ID ='$ticketID' ";

            if($conn->query($sql)){

                echo "<script>alert('deleted')</script>";

            }
        }
        else{
            echo "delete failed".$conn->error;
        }

    }

    $conn->close();
?>