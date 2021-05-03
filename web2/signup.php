<?php 
    session_start();
    include('connect_db.php');
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>signup</title>
        <!-- Import Bootstrap and JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
        </script>
        <!-- My CSS and JQuery -->
        <link href="Style-signup.css" rel="stylesheet">
        <script type="text/javascript" src="./jquery/index.js"></script>
    </head>
    <body>
        <div class="container-fluid bg">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 row-container" id="form">

                <form method="post">
                    <h1>Sign up</h1>
                    <p>Please fill in this form to create an account.</p>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="signupEmail" required>
                        <p class="emailError"></p>
                     </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="signupPsw" required>
                        <p class="passwordError"></p>
                    </div>

                    <div class="form-group">
                        <label class="label">Enter Password</label>
                        <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
                        <p class="passwordError"></p>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn-register" name="signupSubmit">Sign up</button>

                    <br>
                    <p class="fse">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <button type="button" onclick="window.location.href='index.php'" class="btn-cancel">
                        Cancel
                    </button>

                    <br><br><br>
                    <?php
                    if (isset($_SESSION['signup']))
                    {
                        echo $_SESSION['signup'];
                        unset($_SESSION['signup']);
                    }
                    ?>

                </form>
                </div>
            </div>
        </div>
    </body>

    <?php 
        if (isset($_POST['signupSubmit']))
        {
            $username = $_POST['signupEmail'];
            $password = md5($_POST['signupPsw']);
            $repeatPsw = md5($_POST['psw-repeat']);

            if ($password == $repeatPsw)
            {
                $sql = "INSERT INTO users(accountName, accountPassword) VALUES('$username', '$password')";

                $res = mysqli_query($con, $sql);

                if ($res) {
                    $_SESSION['signuped'] = "ok";
                    
                    header('location:http://localhost/timelineProject/web2/index.php');
                }
                else 
                {
                    $_SESSION['signup'] = "<div style='color:red'>Có lỗi xảy ra trong quá trình thực hiện</div>";
                    header('location:http://localhost/timelineProject/web2/signup.php');
                }
            }
            else 
            {
                $_SESSION['signup'] = "<div style='color:red'>Password không giống nhau</div>";
                header('location:http://localhost/timelineProject/web2/signup.php');
            }
        }
    ?>

</html>