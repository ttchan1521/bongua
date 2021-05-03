<!DOCTYPE html>
<html>
    <head>
        <title>Admin_Header</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="admin.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include '../connect_db.php';
        include '../function.php';
        if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập 
            ?>
            <div id="admin-heading-panel" >
                <div class="left-panel">
                    <a class="logo">Timeline</a>
                </div>
                <div class="right-panel">
                    <img height="24" src="../images/home.png" />
                    <a href="index.php">Trang chủ</a>
                    <a href="change_password.php">Đổi mật khẩu</a>
                    <a href="logout.php"><i class="material-icons">&#xe7ff;</i>Logout</a>
                </div>
            </div>

            <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Admin Menu</div>
                        <div class="menu-items">
                            <ul>
                                <li><a href="users.php">Users</a></li>
                                <li><a href="timeline_listing.php">Timelines</a></li>
                                <li><a href="add_admin.php">Add Admin</a></li>
                            </ul>
                        </div>
                    </div>
            <?php } ?>