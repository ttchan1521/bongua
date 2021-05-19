<?php
    session_start();
              $im = imagegrabscreen();
              $tml = $_GET['id'];

              imagepng($im, "tml".$tml.".png");
              imagedestroy($im);
              $id = $_SESSION['userID'];
              header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
?>