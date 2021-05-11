<?php
    session_start();
    include('connect_db.php');

    $id = $_GET['id'];
    $uid = $_GET['u'];
    $eid = $_GET['e'];

    $sql = "SELECT * FROM events WHERE eventID = $uid";

    $res = mysqli_query($con, $sql);

    if ($res)
    {
        header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=$eid");
    }
?>