<?php 
    session_start();

    $_SESSION['sort_user'] = $_POST['sort'];

    header("location:http://localhost/timelineProject/web2/users.php");
?>