<?php 
session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['accountName'])) {

 ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <!-- Import Bootstrap and JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="changep_style.css">

</head>
<body>
<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6 col-xs-12 row-container" id="form">

            <form action="change-p.php" method="post">
                <h1>Change Password</h1>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control"
                           name="op"
                           placeholder="Old Password">
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control"
                           name="np"
                           placeholder="New Password">
                </div>

                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control"
                           name="c_np"
                           placeholder="Confirm New Password">
                </div>

                <button type="submit" id="change" class="btn btn-success btn-block my-3">CHANGE</button>
                <button type="button"
                        onclick="window.location.href='user-web.php?id=<?php echo $_SESSION['userID']; ?>'"
                        class="btn-cancel">
                    Cancel
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>