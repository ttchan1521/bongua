<?php
    session_start();
    include('connect_db.php');

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
    $isAdmin = $_POST['user-admin'];

    $sql = "INSERT INTO users(accountName, accountPassword, firstName, isAdmin) VALUES('$username', '$password', '$fullname', $isAdmin)";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:http://localhost/timelineProject/web2/users.php");
    }
?>