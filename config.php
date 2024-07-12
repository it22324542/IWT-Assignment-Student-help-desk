<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "help desk";

    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die.("connection failed<br>".$conn->connect_error);
    }

?>