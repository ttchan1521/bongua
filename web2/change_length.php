<?php 
            session_start();
            $_SESSION['length'] = $_POST['timelines_length'];
            $_SESSION['sort'] = $_POST['sort'];
            $id = $_SESSION['userID'];
            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
?>