<?php 
    session_start();
?>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login </title>	
        <!-- Import Bootstrap and JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <script 
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">    
        </script>            
        <!-- My CSS and JQuery -->
        <link href="style_login.css" rel="stylesheet">
        <script type="text/javascript" src="./jquery/index.js"></script> 
    </head>

    <body>
        
        <div class="container-fluid bg">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 row-container" id="form">

                    <div class="imgcontainer">
                        <img src="./images/img_avatar2.jpg" alt="Avatar" class="avatar">
                    </div>
                    
                    <form method="post">
                        <h1>Login</h1>
                        <?php 
                            if (isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }

                        ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter username" name="loginName" required id="username" >
                            <p class="usernameError"></p>
                        </div>
                        <div class="form-group">
                            <label for="password" class="label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="loginPsw" required id="password">            
                            <p class="passwordError"></p>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>   
                        <button type="submit" class="btn btn-success btn-block my-3" name="LoginSubmit">Login</button>

                        <button type="button" onclick="window.location.href='index.php'" class="btn-cancel">
                            Cancel
                        </button>

                        
                        <span class="psw"> <a href="#">Forgot password?</a></span>
        

                    </form>
                </div>
            </div>
        </div>
  
    
        <?php 
            include('connect_db.php');

            if (isset($_POST['LoginSubmit'])) {
                $username = $_POST['loginName'];
                $password = md5($_POST['loginPsw']);

                $sql = "SELECT * FROM users WHERE accountName = '$username' AND accountPassword = '$password'";

                $res = mysqli_query($con, $sql);

                if ($res) {

                    $num = mysqli_num_rows($res);

                    if ($num > 0) {
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['userID'];
                    $_SESSION['userID'] = $id;
                    $_SESSION['accountName'] = $username;
                    header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
                    }  
                    else  {
                        $_SESSION['login'] = "<div style='color: red'>Thông tin đăng nhập không chính xác</div>";
                        header('location:http://localhost/timelineProject/web2/login.php');
                    }
                }
                else {
                    $_SESSION['login'] = "<div style='color:red'>Có lỗi xảy ra trong quá trình thực hiện</div>";
                    header('location:http://localhost/timelineProject/web2/login.php');
                }
            }
        ?>
    </body>
</html>