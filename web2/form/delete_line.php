<?php
    session_start();
    include('connect_db.php');

    $id = $_GET['id'];
    $uid = $_GET['u'];
    $lid = $_GET['l'];
    $from = $_GET['from'];
    $da = date("Y-m-d");

        $sql1 = "UPDATE timelines SET last_updated = '$da' WHERE universeID = $uid";
        $res1 =mysqli_query($con, $sql1);

    $sql = "DELETE FROM `lines` WHERE lineID LIKE '%$lid%'";

    $res = mysqli_query($con, $sql);

    if($res) {
        if($from == "basic") {
            header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=-1");
        }
        if($from == "scaling") {
            header("location:http://localhost/timelineProject/web2/form/scaling_form.php?id=$id&u=$uid&e=-1");
        }
    }
?>