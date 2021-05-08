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
<div id="id01" class="modal" style="background-color: #FDF5E6; color: #1E90FF">

    <form class="modal-content" method="POST" style = "width: 40%; border:none; background-color: #FFEFD5">
        <div class="container">

            <h1>Create new Timeline</h1>
            <p>Please fill in this form to create an timeline</p>

            <label for="name">Name: </label>
            <input type="text" name="name" style="background-color: #FFDAB9"required>

            <div class="clearfix">
                <?php 
                    $id = $_GET['id'];
                ?>
                <a href="add_timeline.php?id=<?php echo $id; ?>" class="cancelbtn" style="background-color:#FFDAB9; color: #1E90FF">Cancel</a>
                <button type="submit" name="submit" class="signupbtn" style = "font-family: 'Gamja Flower'; font-size: 28px; background-color:#FFDAB9; color: #1E90FF">Create</button>
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

        $sql = "INSERT INTO timelines(universesName, userID) VALUES('$named', $id)";

        $res = mysqli_query($con, $sql);

        if ($res)
        {
            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
        }
        
    }
?>
</html>