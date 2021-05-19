<?php
    session_start();
    include('connect_db.php');

    $tml = $_GET['tml'];
    $id = $_GET['id'];

    $sql = "DELETE FROM timelines WHERE universeID = $tml";

    $res = mysqli_query($con, $sql);

    if ($res)
    {
        header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
    }
?>