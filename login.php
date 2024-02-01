<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['userID']) && isset($_POST['userPass'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $id = validate($_POST['userID']);
    $pass = validate($_POST['userPass']);

    $sql = "SELECT * FROM users WHERE userID='$id' AND userPass='$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['userID'] === $id && $row['userPass'] === $pass) {
        $_SESSION['userID'] = $row['userID'];
        if ($row['accountType'] === 'Student') {
            header("Location: ../html/studentPage.php");
        }
        elseif ($row['accountType'] === 'Faculty') {
            header("Location: ../html/facultyPage.html");
        }
        elseif ($row['accountType'] === 'Staff') {
            header("Location: ../html/staffPage.html");
        }
        exit();
    }
    else {
        header("Location: ../html/loginPage.php?error=Invalid Credentials");
        exit();
    }
}
else {
    header("Location: ../html/loginPage.php");
    exit();
}
?>