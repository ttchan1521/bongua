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
    <link rel="stylesheet" href="scaling_form.css">
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
            <a href="paging_form.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&e=-1&page=1&n=4"><div class="form-4"><p>Page By Page</p></div></a>
            <a><div class="form-5"><p>Vertical</p></div></a>
        </div>
        <a href="search_event.php?id=<?php echo $id; ?>&u=<?php echo $uid; ?>&from=basic" class="search-icon" title="Search"><i class="fas fa-search"></i></a>
    </div>
</div>
<div class="wrapper">
    <div class="timeline">
        <?php
          $id = $_GET['id'];
          $sql = "SELECT * FROM events WHERE universeID = $id ORDER BY eventYear";
          $res = mysqli_query($con, $sql);

          if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
              $t = 0;
              while($row = mysqli_fetch_assoc($res))
              {
                $eid = $row['eventID'];
                $eventName = $row['eventName'];
                $description = $row['eventDescription'];
                $year = $row['eventYear'];

                if ($t % 2 == 0) {

                ?>
                  <div class="container right" >
                    <div style="position: relative; right: 180px; bottom:13px;">
                      <h1 style="color: white"><?php echo $year; ?></h1>
                    </div>
                    <div class="content" style="position:relative; bottom: 65px">
                    <div class="dropdown">
                      <h2><?php echo $eventName; ?></h2>
                      <div class="dropdown-content">
                      <a href="edit_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Edit</a>
                      <a href="delete_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Delete</a>
                      </div>
                      </div>
                      <p><?php echo $description; ?></p>
                    </div>
                  </div>
                <?php
                }
                else {
                  ?>
                  <div class="container left" >
                    <div style="position: relative; left: 600px; bottom:13px;">
                      <h1 style="color: white"><?php echo $year; ?></h1>
                    </div>
                    <div class="content" style="position:relative; bottom: 65px">
                    <div class="dropdown">
                      <h2><?php echo $eventName; ?></h2>
                      <div class="dropdown-content">
                      <a href="edit_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Edit</a>
                      <a href="delete_event.php?id=<?php echo $id; ?>&e=<?php echo $eid; ?>">Delete</a>
                      </div>
                      </div>
                      <p><?php echo $description; ?></p>
                    </div>
                  </div>
                <?php
                }
                $t = $t + 1;
              }
            }
            else {
                ?>
                    </div>
                    <div class="nothing"><h2>There's nothing here yet!</h2></div>
                    <div class="nothing-2"><h2>Create something here</h2></div>
                    <div class="nothing-3"><i class="fas fa-share"></i></div>
                <?php
            }
          }
        ?>

      </div>
</div>
      <a href="add_event.php?id=<?php echo $id; ?>" class="add-icon"><i class="fas fa-plus"></i></a>
      <a onclick="window.location.href='../user-web.php?id=<?php echo $_SESSION['userID']; ?>'" class="close-icon"><i class="fas fa-times"></i></a>
</body>
</html>