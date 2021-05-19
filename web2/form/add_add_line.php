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
    <link rel="stylesheet" href="basic_add_line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div id="add-line-box" class="add-line-box">
    <form method="POST">
        <div class="add-line-head">
            <?php
                $id = $_GET['id'];
                $uid = $_GET['u'];
                $from = $_GET['from'];
            ?>
            <a onclick="window.location.href='basic_add_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=<?php echo $from; ?>'" class="close-icon"><i class="fas fa-times"></i></a>
        </div>
        <div class="add-line-main">
            <label for="lineName">Line Name </label><input type="text" name="lineName" required>
        </div>
        <div class="add-line-bottom">
            <button type="submit" name="submit">Create</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['lineName'] ?? "";

        $id = $_GET['id'];
        $uid = $_GET['u'];
        unset($_POST['submit']);
        $da = date("Y-m-d");

        $sql1 = "UPDATE timelines SET last_updated = '$da' WHERE universeID = $uid";
        $res1 =mysqli_query($con, $sql1);

        $sql = "INSERT INTO `lines`(universeID, lineName) VALUES ($uid, '$name')";
        $res = mysqli_query($con, $sql);

        if ($res) {
            header("location:http://localhost/timelineProject/web2/form/basic_add_event.php?id=$id&u=$uid&from=$from");
        }
    }
?>
</body>
</html>