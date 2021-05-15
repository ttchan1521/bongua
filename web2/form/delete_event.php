<?php
    session_start();
    include('connect_db.php');

    $id = $_GET['id'];
    $eid = $_GET['e'];
    $da = date("Y-m-d");

    $sql = "DELETE FROM events WHERE eventID = $eid";
    $sql1 = "UPDATE timelines SET last_updated = '$da' WHERE universeID = $id";

    $res = mysqli_query($con, $sql);
    $res = mysqli_query($con, $sql1);

    if ($res)
    {
        header("location:http://localhost/timelineProject/web2/form/form.php?id=$id");
    }
?>