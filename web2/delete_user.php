<?php

    session_start();
    include('connect_db.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE userID = $id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:http://localhost/timelineProject/web2/users.php");
    }

?>