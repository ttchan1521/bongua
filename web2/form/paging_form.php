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
    <link rel="stylesheet" href="paging_form.css">
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
            <a href="scaling_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-2"><p>Real-Time Scale</p></div></a>
            <a href="basic_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1"><div class="form-3"><p>Basic</p></div></a>
            <a><div class="form-4"><p>Page By Page</p></div></a>
        </div>
        <a href="search_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>" class="search-icon" title="Search"><i class="fas fa-search"></i></a>
    </div>
</div>
<div id="wrapper" class="wrapper">
    <div id="time-line" class="time-line">
        <?php
            $id = $_GET['id'];
            $uid = $_GET['u'];
            $page = $_GET['page'];
            $n = $_GET['n'];

            $e1 = ($page - 1) * $n;

            $sql = "SELECT * FROM events WHERE universeID = $uid ORDER BY eventYear LIMIT $e1, $n";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);

            if($res) {
                if($count > 0) {
                    $i = 0;
                    while($row = mysqli_fetch_assoc($res)) {
                        $name = $row['eventName'];
                        $des = $row['eventDescription'];
                        $date = $row['eventYear'];
                        $date_end = $row['eventYear-end'];
                        $i++;
                        ?>
                        <div id="event-box" class="event-box-<?php echo $i; ?>">
                            <section>
                                <div class="event-head">
                                    <span id="event-name-in-box" class="event-name-in-box"><?php echo $name; ?></span>
                                </div>
                                <div class="event-body">
                                    <p id="event-des-in-box"><?php echo $des; ?></p>
                                    <span id="event-date-in-box"><?php echo $date; ?></span>
                                </div>
                                <div class="event-bottom">
                                    <a href="edit_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>">Edit</a>
                                    <a href="delete_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=<?php echo $eid; ?>">Delete</a>
                                </div>
                            </section>
                        </div>
                        <?php
                    }
                } else {
                    echo "There's nothing yet!";
                }
            } else {
                echo "There's something wrong :(";
            }
        ?>
    </div>
</div>
<div>
    <?php
        $id = $_GET['id'];
        $uid = $_GET['u'];
    ?>
    <a href="add_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>" class="add-icon"><i class="fas fa-plus"></i></a>
</div>
<div id="scroll-icon" class="scroll-icon">
    <?php
        $id = $_GET['id'];
        $uid = $_GET['u'];
        $page = $_GET['page'];
        $n = $_GET['n'];

        $en = $page * $n;
        $sql = "SELECT * FROM events WHERE universeID = $uid ORDER BY eventYear";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        $page = $_GET['page'];
        if($page > 1) {
            ?>
                <a href="paging_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=<?php echo $page - 1;?>&n=<?php echo $n; ?>" id="scroll-icon-left" class="scroll-icon-left"><i class="fas fa-angle-left"></i></a>
            <?php
        }
        if($en < $count) {
            ?>
                <a href="paging_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=<?php echo $page + 1;?>&n=<?php echo $n; ?>" id="scroll-icon-right" class="scroll-icon-right"><i class="fas fa-angle-right"></i></a>
            <?php
        }
    ?>
</div>

</body>
</html>