<?php
    $sname = "localhost";
    $uname = "somaiya";
    $password = "somaiya";
    $db_name = "college_management";
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    if (!$conn) {
        die("Failed to connect: ". mysqli_connect_error());
    }
?>