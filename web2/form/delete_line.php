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

    $sql = "DELETE FROM `lines` WHERE lineID = $lid";

    $sqll = "SELECT lineName FROM lines WHERE lineD = $lid";

    $r = mysqli_query($con, $sqll);

    $row = mysqli_fetch_assoc($r);

    $name = $row['lineName'];

    $sqlll = "DELETE FROM events WHERE eventLine = '$name'";

    $ress = mysqli_query($con, $sqlll);

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