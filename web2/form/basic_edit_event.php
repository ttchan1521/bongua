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
    <link rel="stylesheet" href="basic_edit_event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="add-event-box" class="add-event-box">
    <form method="POST">
        <div class="add-event-head">
            <?php
                $id = $_GET['id'];
                $uid = $_GET['u'];
                $eid = $_GET['e'];
                $from = $_GET['from'];

                $sql = "SELECT * FROM events WHERE eventID = $eid";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res);

                $ex_name = $row['eventName'];
                $ex_date = $row['eventYear'];
                $ex_des = $row['eventDescription'];
                $ex_line = $row['eventLine'];
            ?>
            <a onclick="window.location.href='<?php echo $from; ?>_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=1&n=4'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="add-event-main">
            <label for="eventName">Event Name </label><input type="text" name="eventName" value="<?php echo $ex_name; ?>"><br>
            <label for="eventDate">Event Year </label><input type="number" name="eventDate" required value="<?php echo $ex_date; ?>">
        </div>
        <div class="add-event-des">
            <label for="eventDes">Event Description:</label><br>
            <textarea type="longtext" name="eventDes"><?php echo $ex_des; ?></textarea><br>
        </div>
        <div class="add-event-bottom">
            <a onclick="document.getElementById('more').style.display='none'; document.getElementById('less').style.display='block'; document.getElementById('add-event-bottom-est').style.display='block'; document.getElementById('add-event-box').style.top='0px'" id="more" class="more">More</a>
            <a onclick="document.getElementById('more').style.display='block'; document.getElementById('less').style.display='none'; document.getElementById('add-event-bottom-est').style.display='none'; document.getElementById('add-event-box').style.top='10px'" id="less" class="less">Less</a>
            <button type="submit" name="submit">Edit</button>
        </div>
        <div id="add-event-bottom-est" class="add-event-bottom-est">
            <label for="eventLine">Event Line:</label>
            <?php
            $uid = $_GET['u'];

            $sql = "SELECT * FROM `lines` WHERE universeID = $uid ORDER BY lineName";
            $res = mysqli_query($con, $sql);

            $line = mysqli_fetch_assoc($res)['lineName'];
            while($row = mysqli_fetch_assoc($res)) {
                $line = $row['lineName'];
                $lid = $row['lineID'];

                if(strpos($ex_line, $line) !== false) {
                ?>
                <div class="eventLine">
                    <input type="checkbox" name="eventLine[]" value="<?php echo $line; ?>" checked><label> <?php echo $line; ?></label>
                </div>
                <?php
                } else {
                ?>
                <div class="eventLine">
                    <input type="checkbox" name="eventLine[]" value="<?php echo $line; ?>"><label> <?php echo $line; ?></label>
                </div>
            <?php
                }
            }
            ?>
            <a href="edit_add_line.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>&from=<?php echo $from; ?>" class="add-line">More Line</a>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['eventName'] ?? "";
        $date = $_POST['eventDate'];
        $des = $_POST['eventDes'] ?? "";

        $line = "";

        if(!empty($_POST['eventLine'])) {
            foreach($_POST['eventLine'] as $selected) {
                $line .= $selected . ' ';
            }
            $line = substr($line, 0, -1);
        }

        $id = $_GET['id'];
        $uid = $_GET['u'];
        unset($_POST['submit']);
        $da = date("Y-m-d");

        $sql = "UPDATE events SET eventName = '$name', eventYear = '$date', eventDescription = '$des', eventLine = '$line' WHERE eventID = $eid";
        $sql1 = "UPDATE timelines SET last_updated = '$da' WHERE universeID = $uid";
        $res = mysqli_query($con, $sql);
        $ress = mysqli_query($con, $sql1);

        if ($res) {
            if($from == "basic") {
                header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=-1");
            }
            if($from == "paging") {
                header("location:http://localhost/timelineProject/web2/form/paging_form.php?id=$id&u=$uid&e=-1");
            }
            if($from == "scaling") {
                header("location:http://localhost/timelineProject/web2/form/scaling_form.php?id=$id&u=$uid&e=-1");
            }
            if($from == "table") {
                header("location:http://localhost/timelineProject/web2/form/table_form.php?id=$id&u=$uid&e=-1");
            }
            if($from == "vertical") {
                header("location:http://localhost/timelineProject/web2/form/vertical_form.php?id=$id&u=$uid&e=-1");
            }
        }
    }
?>
</body>
</html>