<?php
    include_once 'config.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My tickets</title>

    <link rel="stylesheet" href="previous tickets.css">

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

    <div class="feedbackArea">
        <?php
            global $conn;


        if(isset($_SESSION['email']))
        {
            $stuEmail = $_SESSION['email'];

            $sql = "SELECT T.ticket_ID,T.subject,T.type,T.issue,R.answer FROM ticket T,response R WHERE T.ticket_ID = R.ticket_ID AND T.email = '$stuEmail'";

            $result = $conn->query($sql);

            echo "<table border='1' class='feedbacktable'>";
                echo "<tr>";
                echo "<th>"."Ticket ID"."</th>";
                echo "<th>"."Subject"."</th>";
                echo "<th>"."type"."</th>";
                echo "<th>"."issue"."</th>";
                echo "<th>"."answer"."</th>";
                echo "</tr>";

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row['ticket_ID']."</td>";
                    echo "<td>".$row['subject']."</td>";
                    echo "<td>".$row['type']."</td>";
                    echo "<td>".$row['issue']."</td>";
                    echo "<td>".$row['answer']."</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }

            else{
                 echo "item can not be found";
            }
        }
        
        else{

            echo "session not found";

        }


        mysqli_close($conn);    
        ?>

        <div class="deleteRec">
            <form action="deleterec.php" method="post">
                <label>Delete ticket :</label><br><br>
                <input type="number" name="deleteR" required>
                <input type="submit" name="deletebtn">
            </form>
        </div>

        <div class="givefeedback">
            <form action="feedback.php" method="post">
                <label>Give a feedback :</label><br><br>
                <input type="submit" name="givefeedback" value="Give feedback" required>
            </form>
        </div>

    </div>

    <footer class="foot">
            <center>
                <nav>
                    <a href="aboutUS.html" class="nav-link">About us </a> |
                    <a href="contactUS.html" class="nav-link"> contact us </a> |
                    <a href="FAQ.html" class="nav-link" > FAQ</a>
                </nav>

                <p>&copy; All Copyright Received</p>
            </center>
    </footer>

</body>
</html>