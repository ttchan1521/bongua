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
                $eid = $_GET['e'];

                $sql = "SELECT * FROM events WHERE eventID = $eid";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res);

                $ex_name = $row['eventName'];
                $ex_date = $row['eventYear'];
                $ex_des = $row['eventDescription'];
            ?>
            <a onclick="window.location.href='form.php?id=<?php echo $id; ?>'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="edit-event-main">
            <label for="eventName">Event Name </label><input type="text" name="eventName" value="<?php echo $ex_name; ?>"><br>
            <label for="eventDate">Event Year </label><input type="number" name="eventDate" required value="<?php echo $ex_date; ?>"><br>
            <label for="eventDes">Event Description</label><br>
            <textarea name="eventDes"><?php echo $ex_des; ?></textarea><br>

        </div>
        <div class="edit-event-bottom">
            <button type="submit" name="submit">Edit</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['eventName'];
        $date = $_POST['eventDate'];
        $des = $_POST['eventDes'];

        $eid = $_GET['e'];

        $sql = "UPDATE events SET eventName = '$name', eventYear = $date, eventDescription = '$des' WHERE eventID = $eid";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/form.php?id=$id");
        }
        else
        {
            echo "Co lỗi";
        }
    }
?>
</body>
</html>