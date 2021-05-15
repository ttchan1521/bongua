<?php
    session_start();
    include("connect_db.php");

    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $isAdmin = $_POST['user-admin'];

    $sql = "UPDATE users SET accountName = '$username', firstName = '$fullname', isAdmin = $isAdmin WHERE userID = $id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:http://localhost/timelineProject/web2/users.php");
    }
?>