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
<div id="id01" class="modal">

    <form class="modal-content" method="POST">
        <div class="container">
            <?php 
                    $id = $_GET['id'];
                    $tml = $_GET['tml'];
                    $tmlName = $_GET['tmlName'];
            ?>

            <h1>Create new Timeline</h1>
            <p>Please fill in this form to create an timeline</p>

            <label for="name">Name: </label>
            <input type="text" name="name" required value="<?php echo $tmlName; ?>">

            <div class="clearfix">
                <a href="user-web.php?id=<?php echo $id; ?>" class="cancelbtn">Cancel</a>
                <button type="submit" name="submit" class="signupbtn">Rename</button>
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

        $sql = "UPDATE timelines SET universesName = '$named' WHERE universeID = $tml";

        $res = mysqli_query($con, $sql);

        if ($res)
        {
            header("location:http://localhost/timelineProject/web2/user-web.php?id=$id");
        }
        
    }
?>
</html>