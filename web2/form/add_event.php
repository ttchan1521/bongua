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
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-md-5 row-container">
            <form method="POST">
                <div class="add-event-head">
                <?php
                    $id = $_GET['id'];
                ?>
                <a onclick="window.location.href='form.php?id=<?php echo $id; ?>'" class="close-icon"><i class="fas fa-times"></i></a>
                </div>
                <br></br>
                <div class="form ">
                    <label for="eventName">Event Name </label><input type="text" class="form-input" name="eventName"><br>
                    <label for="eventDate">Event Year </label><input type="number" class="form-input" name="eventDate" required><br>
                    <label for="eventDes">Event Description</label><br>
                    <textarea type="longtext"  name="eventDes" style="width: 95%;"></textarea><br>
                    <button type="submit" name="submit" class="btnCreate">Create</button>
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

        $id = $_GET['id'];
        unset($_POST['submit']);

        $sql = "INSERT INTO events(universeID, eventName, eventDescription, eventYear) VALUES ($id, '$name', '$des', $date)";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/form.php?id=$id");
        }
    }
?>
</body>
</html>