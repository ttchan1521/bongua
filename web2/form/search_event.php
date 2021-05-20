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
    <link rel="stylesheet" href="search_event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="search-event-box" class="search-event-box">
    <form method="POST">
        <div class="search-event-head">
            <?php
                $id = $_GET['id'];
                $uid = $_GET['u'];
                $from = $_GET['from'];
            ?>
            <a onclick="window.location.href='<?php echo $from; ?>_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=1&n=4'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-event-main">
            <label for="eventName">Event Name </label><input type="text" name="eventName"><br>
            <label for="eventDate">Event Year </label><input type="year" name="eventDate"><br>
            <label for="eventDes">Event Description </label><input type="text" name="eventDes"><br>
            <label for="eventLine">Event Line </label><input type="text" name="eventLine">
        </div>
        <div class="search-event-bottom">
            <button type="submit" name="submit">Search</button>
        </div>
        <div class="search-event-result">
            <?php
            if(isset($_POST['submit'])) {
                $name = $_POST['eventName'];
                $date = $_POST['eventDate'];
                $des = $_POST['eventDes'];
                $line = $_POST['eventLine'];

                $id = $_GET['id'];
                $uid = $_GET['u'];
                unset($_POST['submit']);

                $sql = "SELECT *  FROM events WHERE universeID = $uid AND eventName LIKE '%$name%' AND eventDescription LIKE '%$des%' AND eventLine LIKE '%$line%' AND eventYear LIKE '%$date%'";
                $res = mysqli_query($con, $sql);

                if($res) {
                    $count = mysqli_num_rows($res);
                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <div class="result">
                            <a href="basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $row['eventID']; ?>" class="event-icon"><i class="fas fa-fan"></i>
                            <label><?php echo $row['eventYear'] . ": " . $row['eventName']; ?></label></a>
                            </div>
                            <?php
                        }
                        ?>
                    <?php
                    } else {
                        echo "There are none!";
                    }
                }
            }
        ?>
        </div>
    </form>
</div>

</body>
</html>