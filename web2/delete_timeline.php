<?php
    session_start();
    include('connect_db.php');

    $tml = $_GET['tml'];
    $id = $_GET['id'];

    $sql = "DELETE FROM timelines WHERE universeID = $tml";

    $sql1 = "UPDATE users SET universeAmount = universeAmount - 1 WHERE userID = $id";

    $res = mysqli_query($con, $sql);
    $res1 = mysqli_query($con, $sql1);

    if ($res)
    {
        header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
    }
?>