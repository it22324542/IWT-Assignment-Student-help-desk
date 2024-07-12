<?php
    include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>tickets for staff</title>

    <link rel="stylesheet" href="staff ticketig page.css">

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
            <a href="">FAQ</a>
    </div>

    <div class="ticketArea">
        <?php
            global $conn;
            $sql = 'SELECT * FROM ticket';
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                echo "<table border='1' class='feedbacktable'>";
                echo "<tr>";
                echo "<th>"."TicketID"."</th>";
                echo "<th>"."Email"."</th>";
                echo "<th>"."Name"."</th>";
                echo "<th>"."Subject"."</th>";
                echo "<th>"."Type"."</th>";
                echo "<th>"."Issue"."</th>";
                echo "<th>"."Date"."</th>";
                echo "</tr>";

                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row['ticket_ID']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['subject']."</td>";
                    echo "<td>".$row['type']."</td>";
                    echo "<td>".$row['issue']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }

            else{
                 echo "table can not be found";
            }


        mysqli_close($conn);    
        ?>
        
        <p>
            <form action="responding.php" method="post">
                <label>Select the Ticket you with to Answer : </label><br><br>
                <input type="number" name="ticketNum" id="ticketNum" required>
                <br><br>
                <input type="submit" name="submitbtn">
            </form>
        </p>

    </div>

    <footer class="foot">
            <center>
                <nav>
                    <a href="aboutUS.html">About us </a> |
                    <a href="contactUS.html"> contact us </a> |
                    <a> FAQ</a>
                </nav>

                <p>&copy; All Copyright Received</p>
            </center>
    </footer>

</body>
</html>