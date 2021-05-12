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
    <link rel="stylesheet" href="add_event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="add-event-box" class="add-event-box">
    <form method="POST">
        <div class="add-event-head">
            <?php
                $id = $_GET['id'];
                $uid = $_GET['u'];
            ?>
            <a onclick="window.location.href='basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="add-event-main">
            <label for="eventName">Event Name </label><input type="text" name="eventName"><br>
            <label for="eventDate">Event Year </label><input type="number" name="eventDate" required>
        </div>
        <div class="add-event-bottom">
            <a onclick="">More</a>
            <button type="submit" name="submit">Create</button>
        </div>
        <div class="add-event-bottom-est">
            <label for="eventDes">Event Description</label><br>
            <textarea type="longtext" name="eventDes"></textarea><br>
            <label for="eventLine">Event Line</label><input type="text" name="eventLine">
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
        unset($_POST['submit']);

        $sql = "INSERT INTO events(universeID, eventName, eventDescription, eventLine, eventYear) VALUES ($uid, '$name', '$des', '$line', $date)";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/basic_form.php?id=$id&u=$uid&e=-1");
        }
    }
?>
</body>
</html>