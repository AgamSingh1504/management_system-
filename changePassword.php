<?php
    session_start(); 
    include "db_conn.php";

    $loggedUser = $_SESSION['userID'];
    if(isset($_POST['submit'])) {

        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $confPass = $_POST['confPass'];
        
        $sql = "SELECT * FROM users WHERE userID = '$loggedUser'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $originalPass = $row['userPass'];

        if($oldPass === $originalPass) {
            if($newPass === $confPass) {

                $sql = "UPDATE users SET userPass = '$newPass' WHERE userID = '$loggedUser'";
    
                if (mysqli_query($conn, $sql)) {
                    header("Location: ../html/studentPage.php?success=Password Change Successful!");
                } 
                else {
                    header("Location: ../html/studentPage.php?error=Password Change Unsuccessful.");
                }
            }
            else {
                header("Location: ../html/studentPage.php?error=Passwords Do Not Match.");
            }
        }
        else {
            header("Location: ../html/studentPage.php?error=Incorrect Password.");
        }
        mysqli_close($conn);
    }
?>