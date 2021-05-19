<?php
    session_start();
    include('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scaling_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<div class="header">
    <div class="tool-bar">
        <?php
            $id = $_GET['id'];
            $uid = $_GET['u'];
        ?>
        <a href="http://localhost/timelineProject/web2/user-web.php?id=<?php echo $id; ?>" class="home-icon" title="Home"><i class="fas fa-home"></i></a>
        <a onmouseover="document.getElementById('form-option').style.display='block'" onmouseout="document.getElementById('form-option').style.display='none'" class="sync-icon" title="Form option"><i class="fas fa-sync-alt"></i></a>
        <div onmouseover="document.getElementById('form-option').style.display='block'" onmouseout="document.getElementById('form-option').style.display='none'" id="form-option" class="form-option">
            <a href="table_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-1"><p>Table</p></div></a>
            <a><div class="form-2"><p>Real-Time Scale</p></div></a>
            <a href="basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-3"><p>Basic</p></div></a>
            <a href="paging_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=1&n=4"><div class="form-4"><p>Page By Page</p></div></a>
        </div>
        <a href="search_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=scaling" class="search-icon" title="Search"><i class="fas fa-search"></i></a>
    </div>
</div>
<div id="wrapper" class="wrapper">
    <?php
        $id = $_GET['id'];
        $uid = $_GET['u'];

        $sql = "SELECT * FROM events WHERE universeID = $uid ORDER BY eventYear";
        $res = mysqli_query($con, $sql);

        if($res) {
            $sql_l = "SELECT * FROM `lines` WHERE universeID = $uid ORDER BY lineName";
            $res_l = mysqli_query($con, $sql_l);
            $first = mysqli_fetch_assoc($res_l)['lineID'] ?? "";

            $sql_l = "SELECT * FROM `lines` WHERE universeID = $uid ORDER BY lineName";
            $res_l = mysqli_query($con, $sql_l);
            $count_l = mysqli_num_rows($res_l);

            if($count_l > 1) {
                if($_GET['e'] == -1) {
                    while($row = mysqli_fetch_assoc($res_l)) {
                        $line = $row['lineName'];
                        $lid = $row['lineID'];
                        ?>
                        <div id="time-line" class="time-line">
                            <a onmouseover="document.getElementById('line-delete-<?php echo $lid; ?>').style.display='block'; document.getElementById('line-delete-<?php echo $first; ?>').style.display='none'" onmouseout="document.getElementById('line-delete-<?php echo $lid; ?>').style.display='none'" href="#" class="line-icon"><i class="fas fa-star"></i></a>
                            <span class="line-name"><?php echo $line; ?></span>
                            <a onmouseover="document.getElementById('line-delete-<?php echo $lid; ?>').style.display='block'" onmouseout="document.getElementById('line-delete-<?php echo $lid; ?>').style.display='none'" href="delete_line.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&l=<?php echo $lid; ?>&from=scaling" id="line-delete-<?php echo $lid; ?>" class="line-delete">Delete</a>
                        <?php

                        $sql_e = "SELECT * FROM events WHERE universeID = $uid AND eventLine LIKE '%$line%' ORDER BY eventYear";
                        $res_e = mysqli_query($con, $sql_e);
                        $sql = "SELECT * FROM events WHERE universeID = $uid ORDER BY eventYear";
                        $res = mysqli_query($con, $sql);
                        ?>
                        <div class="line">
                        <?php
                            $eid_e = mysqli_fetch_assoc($res_e)['eventID'] ?? "";
                            while($row = mysqli_fetch_assoc($res)) {
                                $name = $row['eventName'];
                                $des = $row['eventDescription'];
                                $date = $row['eventYear'];

                                $eid = $row['eventID'];
                                if($eid == $eid_e) {
                                ?>
                                    <a href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $row['eventID']; ?>" class="event-icon"><i class="fas fa-circle"></i></a>
                                    <span class="event-date"><?php echo $date; ?></span>
                                    <span class="event-name"><?php echo $name; ?></span>
                                <?php
                                $eid_e = mysqli_fetch_assoc($res_e)['eventID'] ?? "";
                                } else {
                                    ?>
                                    <a class="event-icon event-icon-not"><i class="fas fa-circle"></i></a>
                                    <?php
                                }
                            }
                        ?>
                        </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div id="time-line" class="time-line">
                        <a href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1" class="line-icon"><i class="fas fa-star"></i></a>
                    <div class="line">
                    <?php
                    while($row = mysqli_fetch_assoc($res)) {
                        $name = $row['eventName'];
                        $des = $row['eventDescription'];
                        $date = $row['eventYear'];
                        $eid = $row['eventID'];
                        ?>
                        <div id="event-<?php echo $eid; ?>" class="event-<?php echo $eid; ?>">
                            <a onmouseover="document.getElementById('event-date').style.display='block'; document.getElementById('event-name').style.display='block'" onmouseout="document.getElementById('event-date').style.display='none'; document.getElementById('event-name').style.display='none'" href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $row['eventID']; ?>" class="event-icon"><i class="fas fa-circle"></i></a>
                            <span id="event-date" class="event-date"><?php echo $date; ?></span>
                            <span id="event-name" class="event-name"><?php echo $name; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    </div>
                    <?php
                }
            } else {
                    ?>
                    <div class="nothing"><h2>There's nothing here yet!</h2></div>
                    <div class="nothing-2"><h2>Create something here</h2></div>
                    <div class="nothing-3"><i class="fas fa-share"></i></div>
                    <?php
            }
        } else {
            echo "There's something wrong :(";
        }
    ?>

    <?php
        $id = $_GET['id'];
        $uid = $_GET['u'];
        $eid = $_GET['e'];
        $curEvent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM events WHERE eventID = $eid"));
        if ($curEvent) {
        $curName = $curEvent['eventName'];
        $curDes = $curEvent['eventDescription'];
        $curDate = $curEvent['eventYear'];
        if($eid != -1) {
            ?>
        <div id="event-box" class="event-box">
            <section>
                <div class="event-head">
                    <span id="event-name-in-box" class="event-name-in-box"><?php echo $curName; ?></span>
                    <a href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1" class="close-icon"><i class="fas fa-times"></i></a>
                </div>
                <div class="event-body">
                    <p id="event-des-in-box"><?php echo $curDes; ?></p>
                </div>
                <div class="event-bottom">
                    <a href="basic_edit_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>&from=scaling">Edit</a>
                    <a href="delete_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>&from=scaling">Delete</a>
                    <span id="event-date-in-box">一 <?php echo $curDate; ?> 一</span>
                </div>
            </section>
        </div>
            <?php
        }
    }
    ?>
</div>
<div>
    <?php
        $id = $_GET['id'];
        $uid = $_GET['u'];
    ?>
    <a href="basic_add_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=scaling" class="add-icon"><i class="fas fa-plus"></i></a>
</div>

</body>
</html>