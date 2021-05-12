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
    <link rel="stylesheet" href="edit_event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="edit-event-box" class="edit-event-box">
    <form method="POST">
        <div class="edit-event-head">
            <?php
                $id = $_GET['id'];
                $uid = $_GET['u'];
                $eid = $_GET['e'];

                $sql = "SELECT * FROM events WHERE eventID = $eid";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res);

                $ex_name = $row['eventName'];
                $ex_date = $row['eventYear'];
                $ex_des = $row['eventDescription'];
                $ex_line = $row['eventLine'];
            ?>
            <a onclick="window.location.href='basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="edit-event-main">
            <label for="eventName">Event Name </label><input type="text" name="eventName" value="<?php echo $ex_name; ?>"><br>
            <label for="eventDate">Event Year </label><input type="number" name="eventDate" required value="<?php echo $ex_date; ?>"><br>
            <label for="eventDes">Event Description</label><br>
            <textarea name="eventDes"><?php echo $ex_des; ?></textarea><br>
            <label for="eventLine">Event Line</label><input type="text" name="eventLine" value="<?php echo $ex_line; ?>">
        </div>
        <div class="edit-event-bottom">
            <button type="submit" name="submit">Edit</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['eventName'] ?? "";
        $date = $_POST['eventDate'];
        $des = $_POST['eventDes'] ?? "";
        $line = $_POST['eventLine'] ?? "";

        $id = $_GET['id'];
        $uid = $_GET['u'];
        $eid = $_GET['e'];

        $sql = "UPDATE events SET eventName = '$name', eventYear = '$date', eventDescription = '$des', eventLine = '$line' WHERE eventID = $eid";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=$eid");
        }
    }
?>
</body>
</html>