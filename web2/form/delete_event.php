<?php
    session_start();
    include('connect_db.php');

    $id = $_GET['id'];
    $uid = $_GET['u'];
    $eid = $_GET['e'];

    $sql = "DELETE FROM events WHERE eventID = $eid";

    $res = mysqli_query($con, $sql);

    if ($res)
    {
        header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=-1");
    }
?>