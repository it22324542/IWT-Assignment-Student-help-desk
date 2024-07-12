<?php
    include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedbacks</title>

    <link rel="stylesheet" href="viewFeedback.css">

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
            $sql = 'SELECT * FROM feedback';
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                echo "<table border='1' class='feedbacktable'>";
                echo "<tr>";
                echo "<th>"."FeedbackID"."</th>";
                echo "<th>"."Name"."</th>";
                echo "<th>"."Email"."</th>";
                echo "<th>"."Message"."</th>";
                echo "</tr>";

                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row['feedback_ID']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['message']."</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }

            else{
                 echo "item can not be found";
            }


        mysqli_close($conn);    
        ?>
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