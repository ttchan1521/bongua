<!DOCTYPE html>
<html>
    <head>
        <title>Admin_Header</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="admin.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
        <style>
            h1{
                margin-top: 15px;
                margin-left : 30px;
            }
            #admin-heading-panel{
                height: 80px;
                background-color: #595959;
            }
            .right-panel{
                font-size: 18px;
                margin-top: 15px;
                margin-right: 20px;
            }
            .right-panel i{
                margin-right: 5px;
            }

        </style>
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
                    <h1><i class="fas fa-home"></i>Home</h1>
                </div>
                <div class="right-panel">
                    <a href="change_password.php"><i class="fas fa-unlock-alt"></i>Change password</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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