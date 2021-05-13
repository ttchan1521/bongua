<?php 
    session_start();
    include('connect_db.php');
?>

<head>

</head>

<body>

    <?php 
        $sql = "SELECT * FROM users";
        $res = mysqli_query($con, $sql);

        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['userID'];
                $username = $row['accountName'];
                $amount = $row['universeAmount'];

                ?>
                    <div><?php echo $username; ?><?php echo $amount; ?></div>
                <?php
            }
        }
    ?>
</body>