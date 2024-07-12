<?php
    include_once 'config.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Responding page</title>
    
    <link rel="stylesheet" href="responding.css">

</head>
<body>
    <div class="container">
        <div class="i1">
            <img src="./img/university logo.png" alt="university logo">
        </div>

        <div class="i2">
            <h1>Student help desk</h1>
        </div>
    </div>

    <hr>

    <center>
    <div class="menubar">
    
            <a href="Home.html">Home</a>
            <a href="aboutUS.html">About us</a>
            <a href="contactUS.html">Contact us</a>
            <a href="FAQ.html">FAQ</a>
    </div>
    </center>

    <center>
        <div class="respondingArea">
            <?php

                global $conn;

                if(isset($_POST['submitbtn'])){

                    $_SESSION['ticketNumber'] =  $_POST['ticketNum'];

                    $ticketnumber = $_POST['ticketNum'];

                    $sql = "SELECT * FROM ticket WHERE ticket_ID = $ticketnumber";
                    $result = $conn->query($sql);

                    if($result->num_rows>0){

                        $row = $result->fetch_assoc();

                    echo "<div class='studentDetails'>";
                    echo "<p>Student Name : <strong id='studentName'>".$row['name']."</strong></p>";
                    echo "<br>";
                    echo "<p>Student Email : <strong id='studentEmail'>".$row['email']."</strong> </p>";
                    echo "<br>";
                    echo "</div>";  
                    echo "<div class='Question'>";
                    echo "<p>Question : ".$row['issue']."</p>";
                    echo "</div>";
                    }

                }

                $conn->close();
            ?>
            

            <form action="submitresponse.php" method="post">
            <div class="answer">
                <p>Response :</p>
                <center>
                    <textarea name="Response" id="Response" cols="30" rows="10"></textarea>
                </center>

                <p>Enter student Email :</p>
                <input type="text" name="email" id="email">
            </div>
            <div class="Responsebtn">
                <button type="submit" name="submitresponse">submit</button>
                <button type="reset">reset</button>
            </div>
            </form>


        </div>
    </center>

    <footer class="foot">
            <p>&copy; All Copyright Received</p>
    </footer>
</body>
</html>
?>