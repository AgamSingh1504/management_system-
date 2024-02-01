<?php
    session_start(); 
    include "db_conn.php";

    if(isset($_POST['submit']))
    {    
        $id = $_POST['registerID'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $branch = $_POST['branch'];
        $acctType = $_POST['acctType'];

        $sql1 = "INSERT INTO users (userID, accountType) VALUES ('$id', '$acctType')";
        
        if ($acctType === 'Student') {
            $sql2 = "INSERT INTO students (studentID, fName, lName, branch) VALUES ('$id', '$fName', '$lName', '$branch')";
        }
        elseif ($acctType === 'Faculty') {
            $sql2 = "INSERT INTO faculty (facultyID, fName, lName, branch) VALUES ('$id', '$fName', '$lName', '$branch')";
        }
        elseif ($acctType === 'Staff') {
            $sql2 = "INSERT INTO staff (staffID, fName, lName, branch) VALUES ('$id', '$fName', '$lName', '$branch')";
        }
    
        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
            header("Location: ../html/registerPage.php?success=Registration Successful!");
        } 
        else {
            header("Location: ../html/registerPage.php?error=Registration unsuccessful.");
        }
    }

    mysqli_close($conn);
?>