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
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-md-5 row-container">
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
                <br></br>
                <div class="form">
                    <label for="eventName">Event Name </label><input type="text" name="eventName" class="form-input" value="<?php echo $ex_name; ?>"><br>
                    <label for="eventDate">Event Year </label><input type="number" name="eventDate" class="form-input" required value="<?php echo $ex_date; ?>"><br>
                    <label for="eventDes">Event Description</label><br>
                    <textarea name="eventDes" style="width: 95%;"><?php echo $ex_des; ?></textarea><br>

                </div>
                <div class="edit-event-bottom">
                    <button type="submit" name="submit" class="btnEdit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['eventName'];
        $date = $_POST['eventDate'];
        $des = $_POST['eventDes'];
        $da = date("Y-m-d");

        $eid = $_GET['e'];

        $sql = "UPDATE events SET eventName = '$name', eventYear = $date, eventDescription = '$des' WHERE eventID = $eid";
        $sql1 = "UPDATE timelines SET last_updated = '$da' WHERE universeID = $id";

        $res = mysqli_query($con, $sql);
        $res1 = mysqli_query($con, $sql1);
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