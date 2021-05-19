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
    <link rel="stylesheet" href="table_form.css">
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
            <a><div class="form-1"><p>Table</p></div></a>
            <a href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-2"><p>Real-Time Scale</p></div></a>
            <a href="basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-3"><p>Basic</p></div></a>
            <a href="paging_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=1&n=4"><div class="form-4"><p>Page By Page</p></div></a>
        </div>
        <a href="search_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=table" class="search-icon" title="Search"><i class="fas fa-search"></i></a>
    </div>
</div>
<div id="wrapper" class="wrapper">
    <div class="table">
        <?php
            $id = $_GET['id'];
            $uid = $_GET['u'];

            $sql = "SELECT * FROM events WHERE universeID = $uid ORDER BY eventYear";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
        ?>
        <table style="width: 100%" id="table">
            <tr>
                <?php
                    $sql_l = "SELECT * FROM `lines` WHERE universeID = $uid ORDER BY lineName";
                    $res_l = mysqli_query($con, $sql_l);
                    $count_l = mysqli_num_rows($res_l);
                    if($count_l > 1) {
                        ?>
                        <th>Year</th>
                        <?php
                        while($row = mysqli_fetch_assoc($res_l)) {
                            $line = $row['lineName'];
                            if($line == "") $line = "Event Name";
                            ?>
                            <th><?php echo $line; ?></th>
                            <?php
                        }
                    }
                ?>
            </tr>
            <?php
                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $year = $row['eventYear'];
                        ?>
                        <tr>
                            <td><?php echo $year; ?></td>
                            <?php
                                $res_l = mysqli_query($con, $sql_l);
                                while($row_l = mysqli_fetch_assoc($res_l)) {
                                    $line = $row_l['lineName'];

                                    $sql_e = "SELECT * FROM events WHERE universeID = $uid AND eventYear = $year AND eventLine LIKE '%$line%'";
                                    $res_e = mysqli_query($con, $sql_e);
                                    $count_e = mysqli_num_rows($res_e);

                                    if($count_e == 0) {
                                        ?>
                                        <td></td>
                                        <?php
                                    }
                                    if($line != "") {
                                        while($row_e = mysqli_fetch_assoc($res_e)) {
                                            $name = $row_e['eventName'] ?? "";
                                            if ($name != "") {
                                                $name = "x";
                                            }
                                            ?>
                                            <td><?php echo $name; ?></td>
                                            <?php
                                        }
                                    } else {
                                        while($row_e = mysqli_fetch_assoc($res_e)) {
                                            $name = $row_e['eventName'] ?? "";
                                            ?>
                                            <td><?php echo $name; ?></td>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    </table>
                    </div>
                    <div class="nothing"><h2>There's nothing here yet!</h2></div>
                    <div class="nothing-2"><h2>Create something here</h2></div>
                    <div class="nothing-3"><i class="fas fa-share"></i></div>
                    <?php
                }
            ?>
    </div>
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
                    <a href="basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1" class="close-icon"><i class="fas fa-times"></i></a>
                </div>
                <div class="event-body">
                    <p id="event-des-in-box"><?php echo $curDes; ?></p>
                </div>
                <div class="event-bottom">
                    <a onclick="">Expand</a>
                    <a href="edit_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>">Edit</a>
                    <a href="delete_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>">Delete</a>
                    <span id="event-date-in-box"><?php echo $curDate; ?></span>
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
    <a href="basic_add_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=table" class="add-icon"><i class="fas fa-plus"></i></a>
</div>

</body>
</html>