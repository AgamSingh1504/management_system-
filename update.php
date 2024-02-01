<?php
    session_start(); 
    include "db_conn.php";

    $loggedUser = $_SESSION['userID'];
    if(isset($_POST['submit']))
    {
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            $sql = "UPDATE students SET email = '$email' WHERE studentID = '$loggedUser'";
            mysqli_query($conn, $sql);
        }
        if(isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            $sql = "UPDATE students SET phone = '$phone' WHERE studentID = '$loggedUser'";
            mysqli_query($conn, $sql);
        }
        if(isset($_POST['address'])) {
            $address = $_POST['address'];
            $sql = "UPDATE students SET resi_address = '$address' WHERE studentID = '$loggedUser'";
            mysqli_query($conn, $sql);
        }

        header("Location: ../html/studentPage.php");
        mysqli_close($conn);
    }
?>