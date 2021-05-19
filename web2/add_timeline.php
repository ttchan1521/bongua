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
        <div class="container" id="cover">

            <h1>Create new Timeline</h1>
            <p>Please fill in this form to create an timeline</p>

            <label for="name">Name: </label>
            <input type="text" name="name" style="background-color: #FFDAB9; height: 70px; font-size: 25px"required>
            <label for="one" style="font-size: 50px"><input id="one" type="radio" name="tmltype" value=1 style="width: 30px; height:30px">One line</label>
            <label for="lines" style="font-size: 50px"><input id="lines" type="radio" name="tmltype" value=2 style="width: 30px; height:30px">Line</label><br>

            <div class="clearfix">
                <?php 
                    $id = $_GET['id'];
                ?>
                <a href="user-web.php?id=<?php echo $id; ?>" class="cancelbtn" style="background-color:#FFDAB9; color: #1E90FF">Cancel</a>
                <button type="submit" name="submit" class="signupbtn" style = "font-family: 'Gamja Flower'; font-size: 35px; background-color:#FFDAB9; color: #1E90FF">Create</button>
            </div>
        </div>
    </form>

</div>
</body>

<?php 
    if (isset($_POST['submit']))
    {
        $named = $_POST['name'];

        $id = $_GET['id'];
        unset($_POST['submit']);
        $line = $_POST['tmltype'];
        $date = date("Y-m-d");

        $sql = "INSERT INTO timelines(universesName, userID, last_updated, tml_type) VALUES('$named', $id, '$date', $line)";

        $res = mysqli_query($con, $sql);

        if ($res)
        {
            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
        }
        
    }
?>
</html>