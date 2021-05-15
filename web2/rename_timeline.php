<?php
    session_start();
    include('connect_db.php');

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <link href="style_userpage.css" rel="stylesheet">
</head>
<body>
<div id="id01" class="modal" style="background-color: #ffd8d8; color: #1E90FF">

    <form class="modal-content" method="POST" style = "width: 50%; border:none; background-color: #e16868; color: #fff;">
        <div class="container" id="cover" style="height: 250px">
            <?php 
                    $id = $_GET['id'];
                    $tml = $_GET['tml'];
                    $tmlName = $_GET['tmlName'];
            ?>


            <label for="name">Name: </label>
            <input type="text" name="name" style="background-color: #FFDAB9; height: 70px; font-size: 25px" required value="<?php echo $tmlName; ?>">

            <div class="clearfix">
                <a href="user-web.php?id=<?php echo $id; ?>" class="cancelbtn" style="background-color:#FFDAB9; color: #1E90FF">Cancel</a>
                <button type="submit" name="submit" class="signupbtn" style = "font-family: 'Gamja Flower'; font-size: 35px; background-color:#FFDAB9; color: #1E90FF">Rename</button>
            </div>
        </div>


    </form>

</div>
</body>

<?php 
    if (isset($_POST['submit']))
    {
        $named = $_POST['name'];

        $tml = $_GET['tml'];
        $id = $_GET['id'];
        unset($_POST['submit']);
        $date = date("Y-m-d");

        $sql = "UPDATE timelines SET universesName = '$named', last_updated = '$date' WHERE universeID = $tml";

        $res = mysqli_query($con, $sql);

        if ($res)
        {
            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
        }
        
    }
?>
</html>