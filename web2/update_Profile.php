<?php 
    session_start();
    include('connect_db.php');
        if (isset($_POST['submit'])) {
          $username = $_POST['username'];
          $firstname = $_POST['firstname'];
          $lastName = $_POST['lastname'];
          $id = $_SESSION['userID'];

          $sql = "UPDATE users SET accountName = '$username', firstName='$firstname', lastName = '$lastName' WHERE userID = $id";

          $res = mysqli_query($con, $sql);

          if ($res) {

            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
          }
        }
    ?>